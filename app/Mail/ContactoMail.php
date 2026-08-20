<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public function build()
    {
        return $this
            ->subject('Nuevo mensaje — ' . $this->datos['nombre'] . ' ' . $this->datos['apellido'])
            ->replyTo($this->datos['correo'], $this->datos['nombre'])
            ->view('emails.contacto');
    }
}
