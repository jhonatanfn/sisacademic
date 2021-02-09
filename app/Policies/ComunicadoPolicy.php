<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Comunicado;

class ComunicadoPolicy
{
    use HandlesAuthorization;

    public function author(User $user,Comunicado $comunicado){
       if($user->id==$comunicado->user_id){
           return true;
       }else{
           return false;
       }
    }

    public function published(?User $user,Comunicado $comunicado){
        if($comunicado->status==2){
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
