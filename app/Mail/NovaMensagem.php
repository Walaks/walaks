<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovaMensagem extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = session()->pull('email');
        $nome = session()->pull('nome');
        $telefone = session()->pull('telefone');
        $msg = session()->pull('msg');

        return $this->markdown('emails.mensagem.contato', compact('msg', 'nome', 'telefone', 'email'));
    }
}
