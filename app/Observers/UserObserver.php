<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->id = Str::uuid();
    }
}
