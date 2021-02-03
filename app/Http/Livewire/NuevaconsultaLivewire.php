<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consulta;

class NuevaconsultaLivewire extends Component
{
    public $matricula,$mensaje;

    protected $messages=[
        'mensaje.required'=>'El campo Mensaje es obligatorio',
    ];

    public function render()
    {
        $matricula=$this->matricula;
        return view('livewire.nuevaconsulta-livewire',compact('matricula'));
    }

    public function enviar(){
        $this->validate([
            'mensaje'=>'required',
        ]);
            
        Consulta::create([
            'mensaje'=>$this->mensaje,
            'matricula_id'=>$this->matricula->id,
            'user_id'=>auth()->user()->id
        ]);

        session()->flash('info', 'Su Mensaje se ha enviado correctamente.'); 
    }
}
