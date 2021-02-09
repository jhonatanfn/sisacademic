<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Periodo;

class MatriculaSeeder extends Seeder
{
    
    public function run()
    {
        
        $alumnos=Alumno::where('id','>=',1)
        ->where('id','<=',18)->get();
        $periodo=Periodo::find(1);
        
        $progracions=$periodo->programacions()->get();      
        foreach($progracions as $programacion){
            foreach($alumnos as $alumno){
                Matricula::create([
                    'alumno_id'=>$alumno->id,
                    'programacion_id'=>$programacion->id
                ]);
            }
        }
    }
}
