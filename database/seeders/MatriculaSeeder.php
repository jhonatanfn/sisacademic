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
        
        $alumnos_1=Alumno::where('id','>=',1)
        ->where('id','<=',5)->get();
        $alumnos_2=Alumno::where('id','>=',6)
        ->where('id','<=',10)->get();
        $alumnos_3=Alumno::where('id','>=',11)
        ->where('id','<=',14)->get();
        $alumnos_4=Alumno::where('id','>=',15)
        ->where('id','<=',18)->get();
        $periodo_1=Periodo::find(1);
        $periodo_2=Periodo::find(2);
        $periodo_3=Periodo::find(3);
        $periodo_4=Periodo::find(4);
        
        $progracions=$periodo_1->programacions()->get();      
        foreach($progracions as $programacion){
            foreach($alumnos_1 as $alumno){
                Matricula::create([
                    'alumno_id'=>$alumno->id,
                    'programacion_id'=>$programacion->id
                ]);
            }
        }
        $progracions=$periodo_2->programacions()->get();    
        foreach($progracions as $programacion){
            foreach($alumnos_2 as $alumno){
                Matricula::create([
                    'alumno_id'=>$alumno->id,
                    'programacion_id'=>$programacion->id
                ]);
            }
        }

        $progracions=$periodo_3->programacions()->get();    
        foreach($progracions as $programacion){
            foreach($alumnos_3 as $alumno){
                Matricula::create([
                    'alumno_id'=>$alumno->id,
                    'programacion_id'=>$programacion->id
                ]);
            }
        }

        $progracions=$periodo_4->programacions()->get();    
        foreach($progracions as $programacion){
            foreach($alumnos_4 as $alumno){
                Matricula::create([
                    'alumno_id'=>$alumno->id,
                    'programacion_id'=>$programacion->id
                ]);
            }
        }

    }
}
