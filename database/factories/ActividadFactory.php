<?php

namespace Database\Factories;

use App\Models\Actividad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Categoria;
use App\Models\Curso;
use App\Models\User;
use App\Models\Estado;

class ActividadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Actividad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titulo= $this->faker->unique()->sentence();
        return [
            'titulo'=>$titulo,
            'slug'=>Str::slug($titulo),
            'extracto'=>$this->faker->text(250),
            'cuerpo'=>$this->faker->text(2000),
            'status'=>$this->faker->randomElement([1,2]),
            'enlace'=>$this->faker->sentence(),
            'categoria_id'=>Categoria::all()->random()->id,
            'user_id'=>User::all()->random()->id,
            'curso_id'=>Curso::all()->random()->id,
            'estado_id'=>Estado::all()->random()->id
        ];
    }
}
