<?php

namespace Database\Factories;

use App\Models\Asistenciae;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matricula;

class AsistenciaeFactory extends Factory
{
    
    protected $model = Asistenciae::class;

    public function definition()
    {
        return [
            'fecha'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'hora'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'status'=>$this->faker->randomElement([1,2,3]),
            'matricula_id'=>Matricula::all()->random()->id
        ];
    }
}
