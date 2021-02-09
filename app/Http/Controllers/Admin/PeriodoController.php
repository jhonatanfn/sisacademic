<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Docente;
use App\Models\Programacion;

class PeriodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:periodo-list|periodo-create|periodo-edit|periodo-delete', ['only' => ['index','show']]);
        $this->middleware('permission:periodo-create', ['only' => ['create','store']]);
        $this->middleware('permission:periodo-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:periodo-delete', ['only' => ['destroy']]);
    } 

    public function index()
    {
        $periodos= Periodo::all();
        return view('admin.periodos.index',compact('periodos'));
    }

    public function create()
    {
        return view('admin.periodos.create');
    }

    public function store(Request $request)
    {
        return $request;
        
        $request->validate([
            'nombre'=>'required',
            'slug'=>'required|unique:periodos',
            'inicio'=>'required',
            'fin'=>'required',
            'status'=>'required'
        ]);
        $periodo=Periodo::create($request->all());

        $docentes= Docente::all();
        foreach($docentes as $docente){
            $cursos= $docente->cursos()->get();
            if(sizeof($cursos)!=0){
                foreach($cursos as $curso){
                        Programacion::create([
                            'curso_id'=>$curso->id,
                            'docente_id'=>$docente->id,
                            'periodo_id'=>$periodo->id,
                            'status'=>1,
                        ]);
                }
            }
        }    

        return redirect()->route('admin.periodos.edit',$periodo)
        ->with('guardar','El periodo se guardó correctamente.');
    }

    public function show(Periodo $periodo)
    {
        return view('admin.periodos.show',compact('periodo'));
    }

    public function edit(Periodo $periodo)
    {
        return view('admin.periodos.edit',compact('periodo'));
    }

    public function update(Request $request, Periodo $periodo)
    {
        $request->validate([
            'nombre'=>'required',
            'slug'=>"required|unique:periodos,slug,$periodo->id",
            'inicio'=>'required',
            'fin'=>'required',
            'status'=>'required'
        ]);
        $periodo->update($request->all());
        return redirect()->route('admin.periodos.edit',$periodo)
        ->with('actualizar','El periodo se actualizó correctamente.');
    }

    public function destroy(Periodo $periodo)
    {
        $periodo->delete();
        return redirect()->route('admin.periodos.index')
        ->with('info','El periodo se eliminó correctamente.');
    }
}
