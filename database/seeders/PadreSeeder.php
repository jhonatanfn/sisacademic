<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Padre;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PadreSeeder extends Seeder
{
    
    public function run()
    {
        $personas=Persona::where('id','>=',12)
        ->where('id','<=',22)->get();

        $permissions_array=[];
        array_push($permissions_array,Permission::find(60));
        array_push($permissions_array,Permission::find(61));
        array_push($permissions_array,Permission::find(62));
        array_push($permissions_array,Permission::find(63));
        array_push($permissions_array,Permission::find(64));
        array_push($permissions_array,Permission::find(65));

        $rolePadre=Role::create(['name' => 'Padre']);
        $rolePadre->syncPermissions($permissions_array);

        foreach($personas as $persona){
            Padre::create([
                'persona_id'=>$persona->id
            ]);
            $user= User::create([
                'name'=>$persona->nombres,
                'email'=>$persona->email,
                'email_verified_at' => now(),
                'password'=>bcrypt('123456789'),
                'remember_token' => Str::random(10),
                'persona_id'=>$persona->id,
            ]);
            $user->assignRole('Padre');
        }
    }
}
