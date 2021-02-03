<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $apellidos=$this->faker->lastName().' '.$this->faker->lastName();
        return [
            'dni'=> $this->faker->unique()->randomNumber($nbDigits = 8,$strict = true),
            'nombres'=>$this->faker->firstName(),
            'apellidos'=>$apellidos,
            'direccion'=>$this->faker->sentence(),
            'telefono' => $this->faker->phoneNumber(),
            'email'=>$this->faker->unique()->safeEmail,
        ];
    }
}
