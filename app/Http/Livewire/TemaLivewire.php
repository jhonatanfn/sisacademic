<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tema;

class TemaLivewire extends Component
{
    use WithPagination;
    public function render()
    {
        $temas= Tema::where('id','>=',1)->latest('id')->paginate(5);
        return view('livewire.tema-livewire',compact('temas'));
    }
}
