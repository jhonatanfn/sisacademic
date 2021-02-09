<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AgregarnotaLivewire extends Component
{
    public $notas;
    public $tipoevaluacions;
    public $situacions;

    public function mount($notas,$tipoevaluacions,$situacions)
    { 
        $this->notas = $notas;
        $this->tipoevaluacions=$tipoevaluacions;
        $this->situacions=$situacions;
    }

    public function render()
    {
        return view('livewire.agregarnota-livewire');
    }

    public function guardar(){
    
        return null;
    }
}
