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
            'comunicado-delete',
            'tema-list',
            'tema-create',
            'tema-edit',
            'tema-delete',
            'reunion-list',
            'reunion-create',
            'reunion-edit',
            'reunion-delete',
            'usuario-list',
            'usuario-create',
            'usuario-edit',
            'usuario-delete',
            'docente-list',
            'docente-create',
            'docente-edit',
            'docente-delete',
            'alumno-list',
            'alumno-create',
            'alumno-edit',
            'alumno-delete',
            'padre-list',
            'padre-create',
            'padre-edit',
            'padre-delete',
            'periodo-list',
            'periodo-create',
            'periodo-edit',
            'periodo-delete',
            'categoria-list',
            'categoria-create',
            'categoria-edit',
            'categoria-delete',
            'curso-list',
            'curso-create',
            'curso-edit',
            'curso-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'programacion-list', 
            'programacion-create', 
            'programacion-edit', 
            'programacion-delete', 
            'nota-list',
            'nota-create',
            'nota-edit',
            'nota-delete',
            'asistenciapadre-list',
            'asistenciapadre-edit',
            'asistenciadocente-list',
            'asistenciadocente-edit',
            'asistenciaalumno-list',
            'asistenciaalumno-edit',
            'administrar-panel',
            'reunion-list-visual',//60
            'reunion-usuario-visual',//61
            'reunion-detalle-visual',//62
            'tema-list-visual',//63
            'tema-usuario-visual',//64
            'tema-detalle-visual',//65
            'perfil-usuario',//66
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
