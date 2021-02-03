<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        $user= User::create([
            'name'=>'Jhonatan Flores',
            'email'=>'jhonatanflores2014@gmail.com',
            'password'=>bcrypt('123456789'),
            'persona_id'=>1
        ]);

        
    }
}
