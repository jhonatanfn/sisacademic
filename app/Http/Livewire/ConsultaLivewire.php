<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Docente;
use App\Models\Curso;
use App\Models\Consulta;

class ConsultaLivewire extends Component
{
    public $docente_id,$curso_id,$mensaje;

    protected $messages=[
        'curso_id.required'=>'El campo Curso es obligatorio',
        'docente_id.required'=>'El campo Docente es obligatorio',
        'mensaje.required'=>'El campo Mensaje es obligatorio',
    ];

    public function render()
    {
        $consultas= Consulta::where('id','>=',1)->latest('id')->paginate(5);
        return view('livewire.consulta-livewire',compact('consultas'));
    }
}
