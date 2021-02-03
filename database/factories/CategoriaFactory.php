<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriaFactory extends Factory
{
    
    protected $model = Categoria::class;

  
    public function definition()
    {
        $nombre= $this->faker->unique()->word(20);
        return [
            'nombre'=>$nombre,
            'slug'=>Str::slug($nombre),
            'color'=>''
        ];
    }
}
