<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;
use App\Models\Periodo;
use App\Models\Programacion;

class ProgramacionSeeder extends Seeder
{
    
    public function run()
    {
        $faker = \Faker\Factory::create();
        $docentes= Docente::all();
        $periodos= Periodo::all();

        foreach($docentes as $docente){
            $cursos= $docente->cursos()->get();
            if(sizeof($cursos)!=0){
                foreach($cursos as $curso){
                    foreach($periodos as $periodo){
                        Programacion::create([
                            'curso_id'=>$curso->id,
                            'docente_id'=>$docente->id,
                            'periodo_id'=>$periodo->id,
                            'status'=>$faker->randomElement([1,2]),
                        ]);
                    }
                }
            }
        }
    }
}
