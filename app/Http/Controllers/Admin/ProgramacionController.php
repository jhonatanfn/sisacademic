<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programacion;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Periodo;
use App\Http\Requests\StoreProgramacionRequest;

class ProgramacionController extends Controller
{
    public function index()
    {
        if(auth()->user()->id !=1){
            $programacions=Programacion::where('docente_id',auth()->user()->persona->docente->id)
            ->paginate(20);
        }else{
            $programacions= Programacion::paginate(10);
        }
        
        return view('admin.programacions.index',compact('programacions'));
    }

    public function create()
    {
       $docentes= Docente::all();
       $cursos= Curso::pluck('nombre','id');
       $periodos= Periodo::pluck('nombre','id');
       
       return view('admin.programacions.create',compact('cursos','docentes','periodos'));
    }


    public function store(StoreProgramacionRequest $request)
    {
        $programacion=Programacion::create($request->all());

        return redirect()->route('admin.programacions.edit',$programacion)
        ->with('guardar','La programacion se guardó correctamente.');
    }

    public function show(Programacion $programacion)
    {
        return view('admin.programacions.show',compact('programacion'));
    }

    public function edit(Programacion $programacion)
    {
        $cursos= Curso::pluck('nombre','id');
        $docentes= Docente::all();
        $periodos= Periodo::pluck('nombre','id');
        return view('admin.programacions.edit',compact('programacion','cursos','docentes','periodos'));
    }

    public function update(StoreProgramacionRequest $request, Programacion $programacion)
    {
        $programacion->update($request->all());
        return redirect()->route('admin.programacions.edit',$programacion)
        ->with('actualizar','La programacion se actualizó correctamente.');
    }

    public function destroy(Programacion $programacion)
    {
        $programacion->delete();
        return redirect()->route('admin.programacions.index')
        ->with('info','La programacion se eliminó correctamente.');
    }
}
