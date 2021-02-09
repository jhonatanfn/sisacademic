<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Models\Comunicado;
use App\Observers\ComunicadoObserver;
use App\Observers\TemaObserver;
use App\Models\Tema;
use App\Models\Reunion;
use App\Observers\ReunionObserver;

class EventServiceProvider extends ServiceProvider
{
    
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot()
    {
        Comunicado::observe(ComunicadoObserver::class);
        Tema::observe(TemaObserver::class);
        Reunion::observe(ReunionObserver::class);
    }
}
