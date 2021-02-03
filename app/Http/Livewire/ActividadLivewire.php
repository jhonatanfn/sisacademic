<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actividad;

class ActividadLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        if(auth()->user()==null){
            $actividades= Actividad::where('status',2)
            ->where('estado_id',1)
            ->latest('id')->paginate(5);
        }else{
            $actividades= Actividad::where('status',2)
            ->latest('id')->paginate(5);
        }
        return view('livewire.actividad-livewire',compact('actividades'));
    }
}
