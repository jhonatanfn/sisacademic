<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Support\Str;

class DocenteSeeder extends Seeder
{
   
    public function run()
    {
        $personas=Persona::where('id','>=',2)
        ->where('id','<=',11)->get();
        
        foreach($personas as $persona){
            Docente::create([
                'persona_id'=>$persona->id,
            ]);

            User::create([
                'name'=>$persona->nombres,
                'email'=>$persona->email,
                'email_verified_at' => now(),
                'password'=>bcrypt('123456789'),
                'remember_token' => Str::random(10),
                'persona_id'=>$persona->id,
            ]);
        }
    }
}
