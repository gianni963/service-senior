<?php

namespace App\Mail;

use App\Annonce;
use App\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnnonceMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $annonce;
    public $body;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Annonce $annonce, Message $message)
    {
        $this->annonce = $annonce;
        $this->body = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mail')
        ->from('servicesenior@example.com');
    }
}
