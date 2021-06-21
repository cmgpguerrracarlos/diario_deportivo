<?php

namespace App\Mail;

use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailConfirmacion extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario, $tipoUsuario, $estadoSolicitud;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Usuario $usuario, $tipoUsuario, $estadoSolicitud)
    {
        $this->usuario = $usuario;
        $this->tipoUsuario = $tipoUsuario;
        $this->estadoSolicitud = $estadoSolicitud;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.solicitudAceptada');
    }
}
