<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EstadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre= $this->faker->unique()->word(20);
        return [
            'nombre'=>$nombre,
            'slug'=>Str::slug($nombre),
            'color'=>$this->faker->randomElement(['red','yellow','green','blue','purple','indigo','pink'])
        ];
    }
}
