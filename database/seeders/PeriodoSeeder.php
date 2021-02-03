<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::create([
            'nombre'=>'Mensual'
        ]);
        Periodo::create([
            'nombre'=>'Bimestral'
        ]);
        Periodo::create([
            'nombre'=>'Trimestral'
        ]);
        Periodo::create([
            'nombre'=>'Ciclo'
        ]);
        Periodo::create([
            'nombre'=>'Semestral'
        ]);
        Periodo::create([
            'nombre'=>'Anual'
        ]);
    }
}
