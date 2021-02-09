<?php

namespace App\Observers;

use App\Models\Comunicado;
use Illuminate\Support\Facades\Storage;

class ComunicadoObserver
{
    
    public function creating(Comunicado $comunicado)
    {
        if(! \App::runningInConsole()){
            $comunicado->user_id=auth()->user()->id;
        }
    }

    public function updated(Comunicado $comunicado)
    {
        //
    }

    public function deleting(Comunicado $comunicado)
    {
        if($comunicado->image){
            Storage::delete($comunicado->image->url);
        }
    }

    public function restored(Comunicado $comunicado)
    {
        //
    }

    public function forceDeleted(Comunicado $comunicado)
    {
        //
    }
}
