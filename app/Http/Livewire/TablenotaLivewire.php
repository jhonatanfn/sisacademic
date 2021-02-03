<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nota;

class TablenotaLivewire extends Component
{
    public $curso_id,$periodo_id,$alumno;

    public function render()
    {
        $matriculas= $this->alumno->matriculas()->get();
        foreach($matriculas as $matricula){
            $curso_id= $matricula->programacion->curso->id;
            $periodo_id= $matricula->programacion->periodo->id;
            if($curso_id==$this->curso_id && $periodo_id==$this->periodo_id){
                $notas= $matricula->notas()->paginate();
            }else{
                $notas= $matricula->notas()->paginate();
            }
        }
        
        return view('livewire.tablenota-livewire',compact('notas'));
    }
}
