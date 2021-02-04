<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'dni'=>'46556963',
            'nombres'=>'Darwin Jhonatan',
            'apellidos'=>'Flores Nuñez',
            'direccion'=>'Castilla-Piura-Peru',
            'telefono'=>'966179817',
            'email'=>'jhonatanflores2014@gmail.com'
        ]);
    
        Persona::factory(39)->create(); 
    }
}
