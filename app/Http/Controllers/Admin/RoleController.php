<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
   
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles= Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function create()
    {
      $permissions= Permission::all();
      return view('admin.roles.create',compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        
        $role= Role::create($request->all());

        if($request->permissions){
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('admin.roles.edit',$role)
        ->with('info','El rol se creó con exito.');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions= Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        if($request->permissions){
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('admin.roles.edit',$role)
        ->with('info','El rol se actualizó con exito.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')
        ->with('info', 'El rol se eliminó con exito.');
    }
}
