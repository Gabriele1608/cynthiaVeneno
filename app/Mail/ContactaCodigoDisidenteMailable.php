<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactaCodigoDisidenteMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Consulta de clientes de Cynthia Veneno";
    public $detallesEmail;

    /**
     * Create a new message instance. 
     *
     * @return void
     */
    public function __construct($detallesEmail)
    {
        $this->detallesEmail = $detallesEmail; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactacodigo');
    }
}
