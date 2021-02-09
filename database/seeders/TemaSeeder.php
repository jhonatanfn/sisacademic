<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tema;
use App\Models\Image;
use App\Models\Programacion;

class TemaSeeder extends Seeder
{
    
    public function run()
    {

        $programacions= Programacion::all();

        foreach($programacions as $programacion){
            Tema::factory(1)->create([
                'programacion_id'=>$programacion->id,
                'user_id'=>$programacion->docente->persona->user->id 
            ]);
        }
        /* $temas = Tema::all();

        foreach($temas as $tema){
            Image::factory(1)->create([
                'imageable_id'=>$tema->id,
                'imageable_type'=>Tema::class
            ]);
        }  */
    }
}
