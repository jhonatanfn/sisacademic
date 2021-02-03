<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    
    public function run()
    {
        
        Categoria::create([
            'nombre'=>'pariatur',
            'slug'=>Str::slug('pariatur'),
            'color'=>'green'
        ]);
        Categoria::create([
            'nombre'=>'impedit',
            'slug'=>Str::slug('impedit'),
            'color'=>'blue'
        ]);

        Categoria::create([
            'nombre'=>'soluta',
            'slug'=>Str::slug('soluta'),
            'color'=>'purple'
        ]);

        Categoria::create([
            'nombre'=>'dolore',
            'slug'=>Str::slug('dolore'),
            'color'=>'indigo'
        ]);

        Categoria::create([
            'nombre'=>'vel',
            'slug'=>Str::slug('vel'),
            'color'=>'pink'
        ]);


    }
}
