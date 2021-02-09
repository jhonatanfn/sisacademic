<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Tema;

class TemaPolicy
{
    use HandlesAuthorization;

    public function author(User $user,Tema $tema){
        if($user->id==$tema->user_id){
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
