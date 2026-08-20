<?php

namespace App\Notifications;

use App\Models\SolicitudPaciente;
use Illuminate\Notifications\Notification;

class NuevaSolicitudPaciente extends Notification
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
        return [
            'tipo'          => 'solicitud_paciente',
            'solicitud_id'  => $this->solicitud->id,
            'titulo'        => 'Nueva solicitud de registro de paciente',
            'mensaje'       => $this->solicitud->nombre . ' ' . $this->solicitud->apellido
                                . ' — solicitado por ' . optional($this->solicitud->user)->name,
            'url'           => route('especialista.solicitudes.index'),
        ];
    }
}
