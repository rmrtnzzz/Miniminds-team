<?php

namespace App\Services;

class FiltroContenidoService
{
    
    public function analizar(string $texto): array
    {
        $normalizado = $this->normalizar($texto);

        if ($resultado = $this->revisarLenguajeOfensivo($normalizado)) {
            return $resultado;
        }

        if ($resultado = $this->revisarSpam($texto, $normalizado)) {
            return $resultado;
        }

        return ['flagged' => false, 'tipo' => null, 'motivo' => null];
    }

    protected function normalizar(string $texto): string
    {
        $texto = mb_strtolower($texto, 'UTF-8');

        return strtr($texto, [
            'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ñ' => 'n',
        ]);
    }

    protected function revisarLenguajeOfensivo(string $normalizado): ?array
    {
        foreach (config('moderacion.palabras_prohibidas', []) as $palabra) {
            $palabra = $this->normalizar($palabra);

            if (preg_match('/(^|[^a-z0-9])' . preg_quote($palabra, '/') . '([^a-z0-9]|$)/u', $normalizado)) {
                return [
                    'flagged' => true,
                    'tipo' => 'ofensivo',
                    'motivo' => "Lenguaje ofensivo detectado (\"{$palabra}\")",
                ];
            }
        }

        return null;
    }

    protected function revisarSpam(string $original, string $normalizado): ?array
    {
        preg_match_all('#https?://[^\s]+|www\.[^\s]+#i', $original, $matches);
        $enlaces = $matches[0] ?? [];

        if (count($enlaces) > config('moderacion.max_enlaces', 2)) {
            return [
                'flagged' => true,
                'tipo' => 'spam',
                'motivo' => 'Demasiados enlaces en el mismo mensaje',
            ];
        }

        $permitidos = config('moderacion.dominios_permitidos', []);
        foreach ($enlaces as $enlace) {
            $host = parse_url(str_starts_with($enlace, 'http') ? $enlace : 'http://' . $enlace, PHP_URL_HOST);
            $host = $host ? strtolower(preg_replace('/^www\./', '', $host)) : null;

            if ($host && !in_array($host, $permitidos, true)) {
                return [
                    'flagged' => true,
                    'tipo' => 'spam',
                    'motivo' => "Enlace sospechoso a un dominio no permitido ({$host})",
                ];
            }
        }

        $maxRepetidos = config('moderacion.max_caracteres_repetidos', 5);
        if (preg_match('/(.)\1{' . ($maxRepetidos - 1) . ',}/u', $normalizado)) {
            return [
                'flagged' => true,
                'tipo' => 'spam',
                'motivo' => 'Patrón de texto típico de spam (caracteres repetidos)',
            ];
        }

        return null;
    }
}
