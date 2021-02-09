<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Reunion;

class ReunionPolicy
{
    use HandlesAuthorization;

    public function author(User $user,Reunion $reunion){
        if($user->id==$reunion->user_id){
            return true;
        }else{
            return false;
        }
    }

    public function __construct()
    {
        //
    }
}
