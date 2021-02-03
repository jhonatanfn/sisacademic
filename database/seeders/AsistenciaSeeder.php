<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asistencia;
use App\Models\Reunion;

class AsistenciaSeeder extends Seeder
{
   
    public function run()
    {
        $faker = \Faker\Factory::create();
        $reunions= Reunion::all();
        
        foreach($reunions as $reunion){
            $programacion=$reunion->programacion()->first();
            $matriculas=$programacion->matriculas()->get();
            foreach($matriculas as $matricula){
                $padre= $matricula->alumno->padre; 
                Asistencia::create([
                    'reunion_id'=>$reunion->id,
                    'padre_id'=>$padre->id,
                    'status'=>$faker->randomElement([1,2,3]),
                ]);
            }
            
        }
    }
}
