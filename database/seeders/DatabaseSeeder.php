<?php

namespace Database\Seeders;

use App\Models\Asistenciad;
use App\Models\Asistenciae;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Periodo;
use App\Models\Situacion;
use App\Models\Tipoevaluacion;

class DatabaseSeeder extends Seeder
{
   
    public function run()
    {

       Storage::deleteDirectory('imagenes');
       Storage::makeDirectory('imagenes');

       $this->call(PersonaSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(PermissionTableSeeder::class);

       $this->call(CategoriaSeeder::class);
       $this->call(ComunicadoSeeder::class);
       $this->call(DocenteSeeder::class); 
       $this->call(PadreSeeder::class);
       $this->call(AlumnoSeeder::class); 
       Periodo::factory(1)->create();
       Tipoevaluacion::factory(5)->create();
       Situacion::factory(4)->create();
       $this->call(CursoSeeder::class);
       $this->call(ProgramacionSeeder::class);
       $this->call(MatriculaSeeder::class);
       $this->call(NotaSeeder::class);
       $this->call(ReunionSeeder::class);
       $this->call(TemaSeeder::class);
       $this->call(CommentSeeder::class);
       $this->call(AsistenciaSeeder::class);
       Asistenciad::factory(10)->create();
       Asistenciae::factory(10)->create(); 
    }
}
