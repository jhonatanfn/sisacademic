<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asistenciad;
use App\Models\Programacion;
use App\Models\Periodo;
use Illuminate\Support\Facades\Date;

class AsistenciadController extends Controller
{
    
    public function index()
    {
        $periodo= Periodo::where('status',1)->first();
        $programacions= $periodo->programacions()->get();
        $asistenciads= array();
        if(count($programacions) !=0){
            foreach($programacions as $programacion){
                if($this->hayAsistenciaHoy($programacion->asistenciads()->get())==false){
                   $asistenciad= Asistenciad::create([
                        'fecha'=>date('Y-m-d'),
                        'hora'=>'00:00:00',
                        'status'=>1,
                        'programacion_id'=>$programacion->id,
                    ]);
                }else{
                    $asistenciad= $this->obtenerAsistenciaHoy($programacion->asistenciads()->get());
                }
                array_push($asistenciads,$asistenciad);
            }
        }

        return view('admin.asistenciads.index',compact('asistenciads'));
    }

    public function hayAsistenciaHoy($lista=array()){
        $valor=false;
        foreach($lista as $item){
            if($item->fecha==date('Y-m-d')){
                $valor= true;
                return $valor;
            }
        }
        return $valor;
    }

    public function obtenerAsistenciaHoy($lista=array()){
        foreach($lista as $item){
            if($item->fecha==date('Y-m-d')){
                return $item;
            }
        }
    }

    public function detalle(Programacion $programacion){
        $asistencias= $programacion->asistenciads()->get();
        return view('admin.asistenciads.detalle',compact('asistencias'));
    }
    public function create()
    {
        return view('admin.asistenciads.create');
    }

 
    public function store(Request $request)
    {
        //
    }

 
    public function show(Asistenciad $asistenciad)
    {
        return view('admin.asistenciads.show',compact('asistenciad'));
    }

   
    public function edit(Asistenciad $asistenciad)
    {
        return view('admin.asistenciads.edit',compact('asistenciad'));
    }

    public function update(Request $request, Asistenciad $asistenciad)
    {
        //
    }

    public function destroy(Asistenciad $asistenciad)
    {
        //
    }
}
