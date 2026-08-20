<?php

namespace App\Notifications;

use App\Models\SolicitudPaciente;
use Illuminate\Notifications\Notification;

class SolicitudPacienteResuelta extends Notification
{
    public SolicitudPaciente $solicitud;

    public function __construct(SolicitudPaciente $solicitud)
    {
        $this->solicitud = $solicitud;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        $aprobada = $this->solicitud->estado === 'aprobada';

        return [
            'tipo'          => 'solicitud_paciente_resuelta',
            'solicitud_id'  => $this->solicitud->id,
            'titulo'        => $aprobada ? '¡Paciente registrado!' : 'Solicitud rechazada',
            'mensaje'       => $aprobada
                ? $this->solicitud->nombre . ' ' . $this->solicitud->apellido . ' fue registrado correctamente.'
                : 'Tu solicitud para ' . $this->solicitud->nombre . ' ' . $this->solicitud->apellido . ' fue rechazada.',
            'url'           => route('paciente.perfil'),
        ];
    }
}
