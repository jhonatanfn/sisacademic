<?php

namespace Database\Factories;

use App\Models\Asistenciad;
use App\Models\Programacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsistenciadFactory extends Factory
{
   
    protected $model = Asistenciad::class;

    
    public function definition()
    {
        return [
            'fecha'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'hora'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'status'=>$this->faker->randomElement([1,2,3]),
            'programacion_id'=>Programacion::all()->random()->id
        ];
    }
}
