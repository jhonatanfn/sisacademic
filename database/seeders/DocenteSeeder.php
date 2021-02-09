<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Support\Str;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DocenteSeeder extends Seeder
{
   
    public function run()
    {
        $personas=Persona::where('id','>=',2)
        ->where('id','<=',11)->get();
        
        $permissions_array=[];
        array_push($permissions_array,Permission::find(1));
        array_push($permissions_array,Permission::find(2));
        array_push($permissions_array,Permission::find(3));
        array_push($permissions_array,Permission::find(4));

        array_push($permissions_array,Permission::find(5));
        array_push($permissions_array,Permission::find(6));
        array_push($permissions_array,Permission::find(7));
        array_push($permissions_array,Permission::find(8));

        array_push($permissions_array,Permission::find(9));
        array_push($permissions_array,Permission::find(10));
        array_push($permissions_array,Permission::find(11));
        array_push($permissions_array,Permission::find(12));

        array_push($permissions_array,Permission::find(45));

        array_push($permissions_array,Permission::find(49));
        array_push($permissions_array,Permission::find(50));
        array_push($permissions_array,Permission::find(51));
        array_push($permissions_array,Permission::find(52));

        array_push($permissions_array,Permission::find(53));
        array_push($permissions_array,Permission::find(54));
        array_push($permissions_array,Permission::find(57));
        array_push($permissions_array,Permission::find(58));

        array_push($permissions_array,Permission::find(59));

        array_push($permissions_array,Permission::find(60));
        array_push($permissions_array,Permission::find(61));
        array_push($permissions_array,Permission::find(62));
        array_push($permissions_array,Permission::find(63));
        array_push($permissions_array,Permission::find(64));
        array_push($permissions_array,Permission::find(65));
        array_push($permissions_array,Permission::find(66));

        $roleDocente=Role::create(['name' => 'Docente']);
        $roleDocente->syncPermissions($permissions_array);

        foreach($personas as $persona){
            Docente::create([
                'persona_id'=>$persona->id,
            ]);

            $user= User::create([
                'name'=>$persona->nombres,
                'email'=>$persona->email,
                'email_verified_at' => now(),
                'password'=>bcrypt('123456789'),
                'remember_token' => Str::random(10),
                'persona_id'=>$persona->id,
            ]);

            $user->assignRole('Docente');

        }
    }
}
