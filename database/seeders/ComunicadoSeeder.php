<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comunicado;
use App\Models\Image;

class ComunicadoSeeder extends Seeder
{
    
    public function run()
    {
        $comunicados=Comunicado::factory(20)->create();

        foreach($comunicados as $comunicado){
            
            Image::create([
                /* 'url'=>'comunicados/'.\Faker\Provider\Image::image(public_path('storage\comunicados'),640,480,null,false), */
                'url'=>'images/comunicado.jpg',
                'imageable_id'=>$comunicado->id,
                'imageable_type'=>Comunicado::class
            ]);
        }
    }
}
