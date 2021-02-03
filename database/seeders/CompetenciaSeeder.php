<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competencia;
use App\Models\Curso;

class CompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     /*    Competencia::factory(60)->create();
        $cursos= Curso::all();
        foreach($cursos as $curso){
            $curso->competencias()->attach([
                rand(1,60),
                //rand(21,60),
            ]);
            $curso->docentes()->attach([
                rand(1,20),
                //rand(1,20),
            ]);
        } */

    }
}
