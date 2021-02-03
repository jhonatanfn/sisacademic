<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Rules\Dninoexiste;

class AlumnoController extends Controller
{

    public function index()
    {
        $alumnos= Alumno::all();
        return view('admin.alumnos.index',compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //$faker = \Faker\Factory::create();
        $rules = [
            'dni'=>'required|unique:personas',
            'nombres'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>'required|unique:personas|email',
            'dnip'=>['required', new Dninoexiste($request->dnip)]
        ];
        $messages = [
            'dnip.required' => 'El dni del padre es obligatorio.'
        ];
        $this->validate($request, $rules, $messages);
        $persona_padre=Persona::where('dni','LIKE',$request->dnip)->first();
        $persona_alumno= Persona::create($request->all());

        $alumno=Alumno::create([
            'persona_id'=>$persona_alumno->id,
            'padre_id'=> $persona_padre->padre->id
        ]); 
        return redirect()->route('admin.alumnos.edit',$alumno)
        ->with('guardar','El alumno se guardó correctamente.');      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('admin.alumnos.show',compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        $dnip=$alumno->padre->persona->dni;
        
        return view('admin.alumnos.edit',compact('alumno','dnip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $persona_id=$alumno->persona->id;
    
        $request->validate([
            'dni'=>"required|unique:personas,dni,$persona_id",
            'nombres'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>"required|unique:personas,email,$persona_id",
            'dnip'=>[new Dninoexiste($request->dnip)]
        ]);
        
        $persona= Persona::find($alumno->persona->id);
        $persona->update($request->all());
        
        return redirect()->route('admin.alumnos.edit',$alumno)
        ->with('actualizar','EL alumno se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('admin.alumnos.index')
        ->with('info','El alumno se eliminó correctamente.');
    }
}
