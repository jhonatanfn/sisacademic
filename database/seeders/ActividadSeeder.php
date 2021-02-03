<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actividad;
use App\Models\Image;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actividads=Actividad::factory(20)->create();

        foreach($actividads as $actividad){
            Image::create([
                'url'=>'actividades/'.\Faker\Provider\Image::image(public_path('storage\actividades'),640,480,null,false),
                'imageable_id'=>$actividad->id,
                'imageable_type'=>Actividad::class
            ]);
        }
    }
}
