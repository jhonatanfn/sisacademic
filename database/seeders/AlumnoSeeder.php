<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Alumno;
use App\Models\Padre;

class AlumnoSeeder extends Seeder
{
    
    public function run()
    {
        $personas_alumnos=Persona::where('id','>=',23)
        ->where('id','<=',40)->get();

        foreach($personas_alumnos as $persona){   
            Alumno::create([
                'persona_id'=>$persona->id,
                'padre_id'=>Padre::all()->random()->id
            ]);
        }
    }
}
