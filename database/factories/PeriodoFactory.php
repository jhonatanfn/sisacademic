<?php

namespace Database\Factories;

use App\Models\Periodo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeriodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Periodo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre= $this->faker->unique()->word(15);
        return [
            'nombre'=>$nombre,
            'slug'=>Str::slug($nombre),
            'inicio'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'fin'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'status'=>1,
        ];
    }
}
