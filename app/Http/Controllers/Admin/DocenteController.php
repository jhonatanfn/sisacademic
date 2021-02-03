<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Persona;
use App\Models\User;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes= Docente::all();
        return view('admin.docentes.index',compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.docentes.create');
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
        $docente=Docente::create(['persona_id'=>$persona->id]);

        User::create([
            'name'=>$persona->nombres,
            'email'=>$persona->email,
            'password'=>bcrypt('123456789'),
            'persona_id'=>$persona->id
        ]); 

        return redirect()->route('admin.docentes.edit',$docente)
        ->with('guardar','El docente se guardó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        return view('admin.docentes.show',compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        return view('admin.docentes.edit',compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        $persona_id=$docente->persona->id;
    
        $request->validate([
            'dni'=>"required|unique:personas,dni,$persona_id",
            'nombres'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>"required|unique:personas,email,$persona_id"
        ]);

        $persona= Persona::find($docente->persona->id);
        $persona->update($request->all());
        $user= $persona->user();
        $user->update([
            'name'=>$persona->nombres,
            'email'=>$persona->email,
        ]);

        return redirect()->route('admin.docentes.edit',$docente)
        ->with('actualizar','EL docente se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();
        return redirect()->route('admin.docentes.index')
        ->with('info','El docente se eliminó correctamente.');
    }
}
