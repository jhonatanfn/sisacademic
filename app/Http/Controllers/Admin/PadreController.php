<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Padre;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Str;

class PadreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $padres= Padre::all();
        return view('admin.padres.index',compact('padres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.padres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni'=>'required|unique:personas',
            'nombres'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>'required|unique:personas',
        ]);

        $persona=Persona::create($request->all());
        $padre=Padre::create(['persona_id'=>$persona->id]);

        User::create([
            'name'=>$persona->nombres,
            'email'=>$persona->email,
            'email_verified_at' => now(),
            'password'=>bcrypt('123456789'),
            'remember_token' => Str::random(10),
            'persona_id'=>$persona->id,
        ]); 

        return redirect()->route('admin.padres.edit',$padre)
        ->with('guardar','El padre se guardó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Padre $padre)
    {
        return view('admin.padres.show',compact('padre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Padre $padre)
    {
        return view('admin.padres.edit',compact('padre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Padre $padre)
    {
        $persona_id=$padre->persona->id;
    
        $request->validate([
            'dni'=>"required|unique:personas,dni,$persona_id",
            'nombres'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>"required|unique:personas,email,$persona_id"
        ]);

        $persona= Persona::find($padre->persona->id);
        $persona->update($request->all());
        $user= $persona->user();
        $user->update([
            'name'=>$persona->nombres,
            'email'=>$persona->email,
        ]);

        return redirect()->route('admin.padres.edit',$padre)
        ->with('actualizar','EL padre se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Padre $padre)
    {
        $padre->delete();
        return redirect()->route('admin.padres.index')
        ->with('info','El padre se eliminó correctamente.');
    }
}
