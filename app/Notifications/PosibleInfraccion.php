<?php

namespace App\Notifications;

use App\Models\Experiencia;
use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class PosibleInfraccion extends Notification
{
    public User $autor;
    public Experiencia $experiencia;
    public string $motivo;
    public string $sancion; 

    public function __construct(User $autor, Experiencia $experiencia, string $motivo, string $sancion)
    {
        $this->autor = $autor;
        $this->experiencia = $experiencia;
        $this->motivo = $motivo;
        $this->sancion = $sancion;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'tipo' => 'posible_infraccion',
            'experiencia_id' => $this->experiencia->id,
            'titulo' => 'Posible infracción detectada',
            'mensaje' => $this->autor->name . ': ' . Str::limit($this->experiencia->contenido, 80)
                . ' — motivo: ' . $this->motivo . ' (sanción: ' . $this->sancion . ')',
            'url' => route('admin.experiencias.index'),
        ];
    }
}
