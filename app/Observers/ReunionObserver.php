<?php

namespace App\Observers;

use App\Models\Reunion;
use Illuminate\Support\Facades\Storage;

class ReunionObserver
{
    /**
     * Handle the Reunion "created" event.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return void
     */
    public function creating(Reunion $reunion)
    {
        if(! \App::runningInConsole()){
            $reunion->user_id=auth()->user()->id;
        }
    }

    /**
     * Handle the Reunion "updated" event.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return void
     */
    public function updated(Reunion $reunion)
    {
        //
    }

    /**
     * Handle the Reunion "deleted" event.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return void
     */
    public function deleting(Reunion $reunion)
    {
        if($reunion->image){
            Storage::delete($reunion->image->url);
        }
    }

    /**
     * Handle the Reunion "restored" event.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return void
     */
    public function restored(Reunion $reunion)
    {
        //
    }

    /**
     * Handle the Reunion "force deleted" event.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return void
     */
    public function forceDeleted(Reunion $reunion)
    {
        //
    }
}
