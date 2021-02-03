<?php

namespace Database\Seeders;

use App\Models\Reunion;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Programacion;

class ReunionSeeder extends Seeder
{
    
    public function run()
    {

        $programacions= Programacion::all();

        foreach($programacions as $programacion){
          Reunion::factory(1)->create([
            'programacion_id'=>$programacion->id,
            'user_id'=>$programacion->docente->persona->user->id
          ]);
        }
        $reunions= Reunion::all();

        foreach($reunions as $reunion){
            Image::create([
                /* 'url'=>'reuniones/'.\Faker\Provider\Image::image(public_path('storage\reuniones'),440,280,null,false), */
                'url'=>'images/reunion.jpg',
                'imageable_id'=>$reunion->id,
                'imageable_type'=>Reunion::class
            ]);
        } 
    }
}
