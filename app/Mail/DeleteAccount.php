<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteAccount extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $raison;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $raison)
    {
        $this->user = $user;
        $this->raison = $raison;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.deletemail')
        ->from('servicesenior@example.com');;
    }
}
