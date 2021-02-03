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
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user= User::find(1);
        $user->assignRole([$role->id]);

        /* $admin= Role::create(['name' => 'Admin']);

        $admin->givePermissionTo([
            'comunicado-list',
            'comunicado-create',
            'comunicado-edit',
            'comunicado-delete'
        ]);

        $user= User::find(1);
        $user->assignRole('Admin'); */

    }
}
