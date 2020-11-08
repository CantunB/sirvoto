<?php

namespace SIRVOTO\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use SIRVOTO\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
        //return $user->hasRole('super-admin') ? true : null;

    }

    public function edit(User $authUser,  User $user)
    {
        return $authUser->id  === $user->id;
    }

    public function update(User $authUser,  User $user)
    {
        return $authUser->id  === $user->id;
    }

    public function destroy(User $authUser,  User $user)
    {
        return $authUser->id  === $user->id;
    }
}
