<?php

namespace App\Observers;

use App\Models\Tema;
use Illuminate\Support\Facades\Storage;

class TemaObserver
{
    /**
     * Handle the Tema "created" event.
     *
     * @param  \App\Models\Tema  $tema
     * @return void
     */
    public function creating(Tema $tema)
    {
        if(! \App::runningInConsole()){
            $tema->user_id=auth()->user()->id;
        }
    }

    /**
     * Handle the Tema "updated" event.
     *
     * @param  \App\Models\Tema  $tema
     * @return void
     */
    public function updated(Tema $tema)
    {
        //
    }

    /**
     * Handle the Tema "deleted" event.
     *
     * @param  \App\Models\Tema  $tema
     * @return void
     */
    public function deleting(Tema $tema)
    {
        if($tema->image){
            Storage::delete($tema->image->url);
        }
    }

    /**
     * Handle the Tema "restored" event.
     *
     * @param  \App\Models\Tema  $tema
     * @return void
     */
    public function restored(Tema $tema)
    {
        //
    }

    /**
     * Handle the Tema "force deleted" event.
     *
     * @param  \App\Models\Tema  $tema
     * @return void
     */
    public function forceDeleted(Tema $tema)
    {
        //
    }
}
