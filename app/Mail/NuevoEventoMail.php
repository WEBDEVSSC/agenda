<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoEventoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $evento;

    // Puedes pasarle datos al constructor
    public function __construct($evento)
    {
        $this->evento = $evento;
    }

    
    public function build()
    {
        return $this->markdown('emails.nuevo-evento') // la vista del correo
                    ->subject('Nuevo evento registrado')
                    ->from('soportewebssc@gmail.com', 'Agenda SSC'); // Correo y nombre del remitente
    }
}

