<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comunicado;
use Livewire\WithPagination;

class ComunicadoLivewire extends Component
{
    use WithPagination;
    
    public function render()
    {
        if(auth()->user()==null){
            $comunicados= Comunicado::where('status',2)
            ->latest('id')->paginate(5);
        }else{
            $comunicados= Comunicado::where('status',2)
            ->latest('id')->paginate(5);
        }
        return view('livewire.comunicado-livewire',compact('comunicados'));
    }
}
