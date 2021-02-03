<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reunion;
use App\Models\Programacion;
use App\Http\Requests\StoreReunionRequest;
use App\Models\Image;
use App\Models\Asistencia;

class ReunionController extends Controller
{
   
    public function index()
    {
        $reunions=Reunion::where('user_id',auth()->user()->id)->latest('id')->paginate(10);
        return view('admin.reunions.index',compact('reunions'));
    }

    public function create()
    {
        $cursos= array();
        $programacions=Programacion::where('docente_id',auth()->user()->persona->docente->id)->get();
        foreach($programacions as $programacion){
            if($programacion->periodo->status==1){
                array_push($cursos,$programacion);
            }
        }
        return view('admin.reunions.create',compact('cursos'));
    }

    public function store(StoreReunionRequest $request)
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

            if($request->file('file')==null){
                Image::create([
                    'url'=>'reuniones/'.\Faker\Provider\Image::image(public_path('storage\reuniones'),640,480,null,false),
                    'imageable_id'=>$reunion->id,
                    'imageable_type'=>Reunion::class
                ]);
            }else{
                $url= $request->file('file')->store('reuniones');
                Image::create([
                    'url'=>$url,
                    'imageable_id'=>$reunion->id,
                    'imageable_type'=>Reunion::class
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
        $cursos= array();
        $programacions=Programacion::where('docente_id',auth()->user()->persona->docente->id)->get();
        foreach($programacions as $programacion){
            if($programacion->periodo->status==1){
                array_push($cursos,$programacion);
            }
        }

        return view('admin.reunions.edit',compact('reunion','cursos'));
    }

    public function update(StoreReunionRequest $request,Reunion $reunion)
    {
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
        $reunion->delete();
        return redirect()->route('admin.reunions.index')
        ->with('info','La reunion se eliminó correctamente.');
    }
}
