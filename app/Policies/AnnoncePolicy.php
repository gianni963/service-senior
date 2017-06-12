<?php

namespace App\Policies;

use App\User;
use App\Annonce;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnoncePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function destroy(User $user, Annonce $annonce)
    {
        return $user->id === $annonce->user_id;
    }

    public function edit(User $user, Annonce $annonce)
    {
        return $user->id === $annonce->user_id;
    }

    public function pay(User $user, Annonce $annonce)
    {
        return $user->id === $annonce->user_id;
    }

    public function update(User $user, Annonce $annonce)
    {
        return $user->id === $annonce->user_id;
    }


}
