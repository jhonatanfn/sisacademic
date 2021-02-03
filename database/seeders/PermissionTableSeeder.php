<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $permissions = [
            'comunicado-list',
            'comunicado-create',
            'comunicado-edit',
            'comunicado-delete'
         ];
        foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'Admin']);
        $role->syncPermissions($permissions);
        
        $user= User::find(1);
        $user->assignRole('Admin');
        */

        $permissions_array=[];
        $permissions = [
            'comunicado-list',
            'comunicado-create',
            'comunicado-edit',
            'comunicado-delete'
         ];
         foreach ($permissions as $permission) {
            array_push($permissions_array,Permission::create(['name' => $permission]));
        }
        $roleAdmin=Role::create(['name' => 'Admin']);
        $roleAdmin->syncPermissions($permissions_array);
        $user= User::find(1);
        $user->assignRole('Admin');
    }
}
