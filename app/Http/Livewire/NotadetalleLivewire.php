<?php

namespace App\Http\Livewire;

use App\Models\Periodo;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Curso;

class NotadetalleLivewire extends Component
{
    use WithPagination;
    public $alumno,$curso_id,$periodo_id;

    public function render()
    {
        $periodos= array();
        $cursos= array();

        $alumno=$this->alumno;
        $matriculas= $this->alumno->matriculas()->latest('id')->paginate(5);
        
   /*       foreach($matriculas as $matricula){
           $periodoObject=$matricula->programacion->periodo;
           $cursoObject=$matricula->programacion->curso;
           
           if($this->search_array($periodoObject->id,$periodos)==false){
            array_push($periodos,$periodoObject);
           }
           
           if($this->search_array($cursoObject->id,$cursos)==false){
            array_push($cursos,$cursoObject);
           } 
        }
        return view('livewire.notadetalle-livewire',
        compact('matriculas','alumno','periodos','cursos','notas'));
 */
         return view('livewire.notadetalle-livewire',
        compact('matriculas','alumno')); 
    }

    public function search_array($id,$array=array()){
        $clave=false;
        foreach($array as $item){
            if($item->id==$id){
               $clave= true;
            }else{
                $clave =false;
            }  
        }
        return $clave;
    }
}
