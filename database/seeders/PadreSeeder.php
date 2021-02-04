<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Padre;
use App\Models\User;
use Illuminate\Support\Str;

class PadreSeeder extends Seeder
{
    
    public function run()
    {
        $personas=Persona::where('id','>=',12)
        ->where('id','<=',22)->get();

        foreach($personas as $persona){
            Padre::create([
                'persona_id'=>$persona->id
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
