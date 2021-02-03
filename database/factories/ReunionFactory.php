<?php

namespace Database\Factories;

use App\Models\Programacion;
use App\Models\Reunion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class ReunionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reunion::class;

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
            'objetivo'=>$this->faker->text(200),
            'contenido'=>$this->faker->text(1000),
            'fecha'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'hora'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            /* 'programacion_id'=>Programacion::all()->random()->id,
            'user_id'=>User::all()->random()->id */
        ];
    }
}
