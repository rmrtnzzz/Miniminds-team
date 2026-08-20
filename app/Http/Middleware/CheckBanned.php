<?php

namespace App\Http\Middleware;

use App\Models\IpBaneada;
use App\Services\BaneoService;
use Closure;
use Illuminate\Http\Request;

class CheckBanned
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        
        if (IpBaneada::where('ip', $ip)->exists()) {
            return response()->view('errores.restringido', ['tipo' => 'permanente'], 403);
        }

        if (auth()->check()) {
            $user = auth()->user();
            $user->ultima_ip = $ip;
            $user->save();

            app(BaneoService::class)->levantarBaneoSiVencio($user);

            if ($user->baneado) {
                $desbaneoRoute = route('desbaneo.create');
                if ($request->path() === 'desbaneo' || $request->path() === ltrim(parse_url($desbaneoRoute, PHP_URL_PATH), '/')) {
                    return $next($request);
                }
                return redirect($desbaneoRoute)->with([
                    'tipo'   => $user->tipo_baneo,
                    'hasta'  => $user->baneado_hasta?->toDateTimeString(),
                    'motivo' => $user->motivo_baneo,
                ]);
            }
        }

        return $next($request);
    }
}
