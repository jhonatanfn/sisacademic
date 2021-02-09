<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comunicado;
use App\Models\Image;

class ComunicadoSeeder extends Seeder
{
    
    public function run()
    {
        $comunicados=Comunicado::factory(10)->create();

       /*  foreach($comunicados as $comunicado){
            
            Image::factory(1)->create([
                'imageable_id'=>$comunicado->id,
                'imageable_type'=>Comunicado::class
            ]);
        } */
    }
}
