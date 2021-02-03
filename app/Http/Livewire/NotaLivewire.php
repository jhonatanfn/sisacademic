<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Matricula;
use Livewire\WithPagination;
use App\Models\Alumno;

class NotaLivewire extends Component
{
    use WithPagination;

    public function render()
    {
         $padre= auth()->user()->persona->padre;
         if($padre !=null){
            $alumnos=$padre->alumnos()->paginate(10);
         }else{
            $alumnos= Alumno::where('id','>=',1)->paginate(10);
         }
         
        return view('livewire.nota-livewire',compact('alumnos'));
    }
}
