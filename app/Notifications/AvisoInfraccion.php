<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AvisoInfraccion extends Notification
{
    public string $estado; 
    public string $motivo;
    public ?int $horas;

    public function __construct(string $estado, string $motivo, ?int $horas = null)
    {
        $this->estado = $estado;
        $this->motivo = $motivo;
        $this->horas = $horas;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        $mensaje = (new MailMessage)->greeting('Hola, ' . $notifiable->name . ':');

        if ($this->estado === 'aviso') {
            return $mensaje->subject('Aviso de precaución - Miniminds')
                ->line("Detectamos contenido que infringe las normas de la comunidad ({$this->motivo}).")
                ->line('Este es un aviso: por favor ten precaución con lo que compartes. Si vuelve a ocurrir, tu cuenta podría ser suspendida temporalmente.');
        }

        if ($this->estado === 'temporal') {
            return $mensaje->subject('Tu cuenta fue suspendida temporalmente - Miniminds')
                ->line("Tu cuenta fue suspendida por {$this->horas} horas debido a: {$this->motivo}.")
                ->line('Futuras infracciones aumentan la duración de la suspensión y pueden derivar en un baneo permanente.');
        }

        return $mensaje->subject('Tu cuenta fue baneada permanentemente - Miniminds')
            ->line("Tu cuenta fue baneada de forma permanente debido a infracciones repetidas: {$this->motivo}.")
            ->line('Ya no podrás acceder a Miniminds desde esta cuenta ni desde esta red.');
    }

    public function toArray($notifiable)
    {
        $titulos = [
            'aviso' => 'Aviso de precaución',
            'temporal' => 'Suspensión temporal de tu cuenta',
            'permanente' => 'Baneo permanente de tu cuenta',
        ];

        $mensajes = [
            'aviso' => "Detectamos contenido que infringe las normas de la comunidad ({$this->motivo}). Ten precaución con lo que compartes.",
            'temporal' => "Tu cuenta fue suspendida temporalmente por {$this->horas} horas debido a: {$this->motivo}.",
            'permanente' => "Tu cuenta fue baneada permanentemente debido a infracciones repetidas: {$this->motivo}.",
        ];

        return [
            'tipo' => 'aviso_infraccion',
            'estado' => $this->estado,
            'titulo' => $titulos[$this->estado],
            'mensaje' => $mensajes[$this->estado],
            'url' => route('experiencias.index'),
        ];
    }
}
