<?php

namespace Database\Seeders;

use App\Models\Tipoevaluacion;
use Illuminate\Database\Seeder;

class TipoevaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipoevaluacion::create([
            'nombre'=>'Practica Califica'
        ]);
        Tipoevaluacion::create([
            'nombre'=>'Trabajo Encargado'
        ]);
        Tipoevaluacion::create([
            'nombre'=>'Examen Parcial'
        ]);
        Tipoevaluacion::create([
            'nombre'=>'Examen Final'
        ]);
        Tipoevaluacion::create([
            'nombre'=>'Intervención Oral'
        ]);
        Tipoevaluacion::create([
            'nombre'=>'Examen Sustitutorio'
        ]);
    }
}
