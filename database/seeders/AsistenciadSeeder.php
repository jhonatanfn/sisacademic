<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programacion;
use App\Models\Asistenciad;

class AsistenciadSeeder extends Seeder
{
    
    public function run()
    {
        $faker = \Faker\Factory::create();
        $programacions= Programacion::all();

        foreach($programacions as $programacion){
            Asistenciad::create([
                'fecha'=>'',
                'hora'=>'',
                'status'=>$faker->randomElement([1,2,3]),
                'programacion_id'=>$programacion->id
            ]);
        }
    }
}
