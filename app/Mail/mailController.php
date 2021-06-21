<?php

namespace App\Mail;

use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailController extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario, $tipoUsuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Usuario $user, $tipóUsuario)
    {
        $this->usuario = $user;
        $this->tipoUsuario = $tipóUsuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.solicitudAdministrador');
    }
}
