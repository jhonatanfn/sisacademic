<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;

class CreatealumnoLivewire extends Component
{
    public $dni,$nombres,$apellidos,$direccion,$telefono,$email,$dnip;
    
    protected $messages=[
        'dnip.required' => 'El dni del padre es obligatorio.'
    ];

    public function render()
    {
        return view('livewire.createalumno-livewire');
    }
    public function save(){
        
        $this->validate([
            'dni'=>'required|unique:personas',
            'nombres'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>'required|unique:personas',
            'dnip'=>'required'
        ]);

       $persona_alumno=Persona::create([
            'dni'=>$this->dni,
            'nombres'=>$this->nombres,
            'apellidos'=>$this->apellidos,
            'direccion'=>$this->direccion,
            'telefono'=>$this->telefono,
            'email'=>$this->email,
        ]);
        $persona_padre= Persona::where('dni','LIKE', $this->dnip)->first();
        $alumno= Alumno::create([]);


        session()->flash('info', 'El alumno ha sido guardado correctamente.');
    }
}
