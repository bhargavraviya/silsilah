<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Couple;

class CouplePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can edit the couple.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Couple  $couple
     * @return mixed
     */
    public function edit(User $user, Couple $couple)
    {
        return $couple->manager_id == $user->id
        || $couple->husband_id == $user->id
        || $couple->wife_id == $user->id
        || is_system_admin($user);
    }
}
