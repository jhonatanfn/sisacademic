<?php

namespace Database\Factories;

use App\Models\Comunicado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Estado;

class ComunicadoFactory extends Factory
{
    
    protected $model = Comunicado::class;

    public function definition()
    {
        $titulo= $this->faker->unique()->sentence();
        return [
            'titulo'=>$titulo,
            'slug'=>Str::slug($titulo),
            'extracto'=>$this->faker->text(250),
            'cuerpo'=>$this->faker->text(2000),
            'status'=>$this->faker->randomElement([1,2]),
            'categoria_id'=>Categoria::all()->random()->id,
            'estado_id'=>Estado::all()->random()->id,
            'user_id'=>User::all()->random()->id
        ];
    }
}
