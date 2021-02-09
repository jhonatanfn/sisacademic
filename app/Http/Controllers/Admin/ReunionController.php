<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reunion;
use App\Models\Programacion;
use App\Http\Requests\ReunionRequest;
use App\Models\Asistencia;
use Illuminate\Support\Facades\Storage;

class ReunionController extends Controller
{
   
    public function index()
    {
        $reunions=Reunion::where('user_id',auth()->user()->id)->latest('id')->paginate(10);
        return view('admin.reunions.index',compact('reunions'));
    }

    public function create()
    {
        $programacionlist= array();
        if(auth()->user()->id==1){
            $programacions= Programacion::all();
        }else{
            $programacions=Programacion::where('docente_id',auth()->user()->persona->docente->id)->get();  
        }
        foreach($programacions as $programacion){
            if($programacion->periodo->status==1){
                array_push($programacionlist,$programacion);
            }
        }
        return view('admin.reunions.create',compact('programacionlist'));
    }

    public function store(ReunionRequest $request)
    {
        $programacion= Programacion::find($request->programacion_id);
        $matriculas=$programacion->matriculas()->get();
    
        if(count($matriculas) !=0){
            $reunion=Reunion::create($request->all());
            
            foreach($matriculas as $matricula){
                $padre= $matricula->alumno->padre; 
                Asistencia::create([
                    'reunion_id'=>$reunion->id,
                    'padre_id'=>$padre->id,
                    'status'=>1,
                ]);
            } 

            if($request->file('file')){
                $url= Storage::put('imagenes', $request->file('file'));
                $reunion->image()->create([
                    'url'=>$url
                ]);
            }
        }else{
            return "No hay padres para esta reunion";
        }

        return redirect()->route('admin.reunions.edit',$reunion)
        ->with('guardar','La reunion se guardó correctamente.');
    }

    public function show(Reunion $reunion)
    {
        return view('admin.reunions.show',compact('reunion'));
    }

    public function edit(Reunion $reunion)
    {
        $this->authorize('author',$reunion);
        $programacionlist= array();
        if(auth()->user()->id==1){
            $programacions= Programacion::all();
        }else{
            $programacions=Programacion::where('docente_id',auth()->user()->persona->docente->id)->get();  
        }
        foreach($programacions as $programacion){
            if($programacion->periodo->status==1){
                array_push($programacionlist,$programacion);
            }
        }

        return view('admin.reunions.edit',compact('reunion','programacionlist'));
    }

    public function update(ReunionRequest $request,Reunion $reunion)
    {
        $this->authorize('author',$reunion);

        $reunion->update($request->all());

        if($request->file('file')!=null){
            $url= $request->file('file')->store('reuniones');
            $reunion->image()->update([
                'url'=>$url
            ]);
        }
        
        return redirect()->route('admin.reunions.edit',$reunion)
        ->with('actualizar','La reunion se actualizó correctamente.');
    }

    public function destroy(Reunion $reunion)
    {
        $this->authorize('author',$reunion);
        $reunion->delete();
        return redirect()->route('admin.reunions.index')
        ->with('info','La reunion se eliminó correctamente.');
    }
}
