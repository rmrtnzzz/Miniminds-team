<?php

namespace App\Services;

use App\Models\Experiencia;
use App\Models\IpBaneada;
use App\Models\User;
use App\Notifications\AvisoInfraccion;
use App\Notifications\PosibleInfraccion;
use Illuminate\Support\Facades\Notification as NotificationFacade;

class BaneoService
{
    
    public function registrarInfraccion(User $user, Experiencia $experiencia, string $motivo, ?string $ip = null): void
    {
        $user->advertencias += 1;

        
        if ($user->advertencias === 1) {
            $user->save();
            $this->avisar($user, 'aviso', $motivo);
            $this->reportarAdmins($user, $experiencia, $motivo, 'aviso');
            return;
        }

        $user->veces_baneado += 1;
        $permanenteDespues = config('moderacion.permanente_despues', 3);

        if ($user->veces_baneado >= $permanenteDespues) {
            $this->aplicarBaneoPermanente($user, $motivo, $ip);
            $this->reportarAdmins($user, $experiencia, $motivo, 'permanente');
            return;
        }

        $this->aplicarBaneoTemporal($user, $motivo);
        $this->reportarAdmins($user, $experiencia, $motivo, 'temporal');
    }

    protected function aplicarBaneoTemporal(User $user, string $motivo): void
    {
        $horasMap = config('moderacion.horas_baneo_temporal', []);
        $horas = $horasMap[$user->veces_baneado] ?? (end($horasMap) ?: 24);

        $user->baneado = true;
        $user->tipo_baneo = 'temporal';
        $user->baneado_hasta = now()->addHours($horas);
        $user->motivo_baneo = $motivo;
        $user->save();

        $this->avisar($user, 'temporal', $motivo, $horas);
    }

    protected function aplicarBaneoPermanente(User $user, string $motivo, ?string $ip = null): void
    {
        $user->baneado = true;
        $user->tipo_baneo = 'permanente';
        $user->baneado_hasta = null;
        $user->motivo_baneo = $motivo;
        $user->save();

        $ip = $ip ?: $user->ultima_ip;
        if ($ip) {
            IpBaneada::firstOrCreate(
                ['ip' => $ip],
                ['user_id' => $user->id, 'motivo' => $motivo]
            );
        }

        $this->avisar($user, 'permanente', $motivo);
    }

    
    public function levantarBaneoSiVencio(User $user): void
    {
        if ($user->tipo_baneo === 'temporal' && $user->baneado_hasta && $user->baneado_hasta->isPast()) {
            $user->baneado = false;
            $user->tipo_baneo = 'ninguno';
            $user->baneado_hasta = null;
            $user->save();
        }
    }

    protected function avisar(User $user, string $estado, string $motivo, ?int $horas = null): void
    {
        $user->notify(new AvisoInfraccion($estado, $motivo, $horas));
    }

    protected function reportarAdmins(User $user, Experiencia $experiencia, string $motivo, string $sancion): void
    {
        $admins = User::where('role', User::ROLE_ADMIN)->get();

        if ($admins->isNotEmpty()) {
            NotificationFacade::send($admins, new PosibleInfraccion($user, $experiencia, $motivo, $sancion));
        }
    }
}
