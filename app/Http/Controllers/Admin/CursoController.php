<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:curso-list|curso-create|curso-edit|curso-delete', ['only' => ['index','show']]);
        $this->middleware('permission:curso-create', ['only' => ['create','store']]);
        $this->middleware('permission:curso-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:curso-delete', ['only' => ['destroy']]);
    } 

    public function index()
    {
        $cursos= Curso::all();
        return view('admin.cursos.index',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cursos.create');
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
            'nombre'=>'required',
            'slug'=>'required|unique:cursos'
        ]);
        $curso=Curso::create($request->all());
        return redirect()->route('admin.cursos.edit',$curso)
        ->with('guardar','El curso se guardó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        return view('admin.cursos.show',compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('admin.cursos.edit',compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre'=>'required',
            'slug'=>"required|unique:cursos,slug,$curso->id"
        ]);
        $curso->update($request->all());
        return redirect()->route('admin.cursos.edit',$curso)
        ->with('actualizar','El curso se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('admin.cursos.index')
        ->with('info','El curso se eliminó correctamente.');
    }
}
