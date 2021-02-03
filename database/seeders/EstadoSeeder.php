<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
   
    public function run()
    {
        Estado::create([
            'nombre'=>'Público',
            'slug'=>'publico',
            'color'=>'red'
        ]);
        Estado::create([
            'nombre'=>'Privado',
            'slug'=>'privado',
            'color'=>'yellow'
        ]);
    }
}
