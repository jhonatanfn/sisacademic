<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Periodo;

class CursoSeeder extends Seeder
{
    
    public function run()
    {
        Curso::factory(20)->create();
        $cursos= Curso::all();
        foreach($cursos as $curso){
            $curso->docentes()->attach([
                rand(1,20),
            ]);
        }
    }
}
