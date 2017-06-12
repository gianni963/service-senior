<?php

namespace App\Policies;

use App\User;
use App\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

        public function ownSentMessage(User $user, Message $message)
        {
            return $user->id === $message->sender_id;
        }

        public function ownReceivedMessage()
        {
            return $user->id === $message->receiver_id;
        }
}
