<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asistenciae;
use App\Models\Programacion;

class AsistenciaeController extends Controller
{
    public function __construct()
     {
         $this->middleware('permission:asistenciaalumno-list|asistenciaalumno-create|asistenciaalumno-edit|asistenciaalumno-delete', ['only' => ['index','show']]);
         $this->middleware('permission:asistenciaalumno-create', ['only' => ['create','store']]);
         $this->middleware('permission:asistenciaalumno-edit', ['only' => ['edit','update','detalle']]);
         $this->middleware('permission:asistenciaalumno-delete', ['only' => ['destroy']]);
    } 
    
    public function index()
    {
        if(auth()->user()->id !=1){
            $programacions=Programacion::where('docente_id',auth()->user()->persona->docente->id)
            ->paginate(10);
        }else{
            $programacions= Programacion::paginate(10);
        }
        return view('admin.asistenciaes.index',compact('programacions'));
    }

    public function detalle(Programacion $programacion){

        $matriculas= $programacion->matriculas()->get();
        $asistenciaes=array();

        if(count($matriculas)!=0){
            foreach($matriculas as $matricula){
                if($this->hayAsistenciaHoy($matricula->asistenciaes()->get())==false){
                   $asistenciae= Asistenciae::create([
                        'fecha'=>date('Y-m-d'),
                        'hora'=>'00:00:00',
                        'status'=>1,
                        'matricula_id'=>$matricula->id,
                    ]); 
                }else{
                    $asistenciae= $this->obtenerAsistenciaActual($matricula->asistenciaes()->get());
                } 
                array_push($asistenciaes,$asistenciae);
            }
        }
        return view('admin.asistenciaes.detalle',compact('asistenciaes'));
    }

    public function hayAsistenciaHoy($lista=array()){
        $valor=false;
        foreach($lista as $item){
            if($item->fecha==date('Y-m-d')){
                $valor=true;
            }
        }
        return $valor;
    }

    public function obtenerAsistenciaActual($lista=array()){
        foreach($lista as $item){
            if($item->fecha==date('Y-m-d')){
                return $item;
            }
        }
    }
  
    public function create()
    {
        return view('admin.asistenciaes.create');
    }

  
    public function store(Request $request)
    {
        //
    }

    public function show(Asistenciae $asistenciae)
    {
        return view('admin.asistenciaes.show',compact('asistenciae'));
    }

    
    public function edit(Asistenciae $asistenciae)
    {
        return view('admin.asistenciaes.edit',compact('asistenciae'));
    }

  
    public function update(Request $request, Asistenciae $asistenciae)
    {
        //
    }

    public function destroy(Asistenciae $asistenciae)
    {
        //
    }
}
