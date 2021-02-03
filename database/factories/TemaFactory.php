<?php

namespace Database\Factories;

use App\Models\Tema;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Programacion;
use App\Models\User;

class TemaFactory extends Factory
{
   
    protected $model = Tema::class;

    public function definition()
    {
        $titulo= $this->faker->unique()->sentence();
        return [
            'titulo'=>$titulo,
            'slug'=>Str::slug($titulo),
            'proposito'=>$this->faker->text(200),
            'contenido'=>$this->faker->text(1000),
           /*  'programacion_id'=>Programacion::all()->random()->id,
            'user_id'=>User::all()->random()->id */
        ];
    }
}
