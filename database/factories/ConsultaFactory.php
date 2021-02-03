<?php

namespace Database\Factories;

use App\Models\Consulta;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matricula;
use App\Models\User;

class ConsultaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consulta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mensaje'=>$this->faker->text(1000),
            'matricula_id'=>Matricula::all()->random()->id,
            'user_id'=>1
        ];
    }
}
