<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tema;
use App\Models\Programacion;
use App\Models\Image;
use App\Http\Requests\StoreTemaRequest;

class TemaController extends Controller
{
    
    public function index()
    {
        $temas= Tema::where('user_id',auth()->user()->id)->paginate(10);
        return view('admin.temas.index',compact('temas'));
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
        return view('admin.temas.create',compact('cursos'));
    }

    public function store(StoreTemaRequest $request)
    {
        $tema=Tema::create($request->all());

        if($request->file('file')==null){
            Image::create([
                'url'=>'temas/'.\Faker\Provider\Image::image(public_path('storage\temas'),640,480,null,false),
                'imageable_id'=>$tema->id,
                'imageable_type'=>Tema::class
            ]);
        }else{
            $url= $request->file('file')->store('temas');
            Image::create([
                'url'=>$url,
                'imageable_id'=>$tema->id,
                'imageable_type'=>Tema::class
            ]);
        }
        return redirect()->route('admin.temas.edit',$tema)
        ->with('guardar','El tema se guardó correctamente.');

    }

  
    public function show(Tema $tema)
    {
        return view('admin.temas.show',compact('tema'));
    }


    public function edit(Tema $tema)
    {
        $cursos= array();
        $programacions=Programacion::where('docente_id',auth()->user()->persona->docente->id)->get();
        foreach($programacions as $programacion){
            if($programacion->periodo->status==1){
                array_push($cursos,$programacion);
            }
        }

        return view('admin.temas.edit',compact('tema','cursos'));
    }

    public function update(StoreTemaRequest $request, Tema $tema)
    {
        $tema->update($request->all());
        
        if($request->file('file')!=null){
            $url= $request->file('file')->store('temas');
            $tema->image()->update([
                'url'=>$url
            ]);
        }
        
        return redirect()->route('admin.temas.edit',$tema)
        ->with('actualizar','El tema se actualizó correctamente.');
    }

  
    public function destroy(Tema $tema)
    {
        $tema->delete();
        return redirect()->route('admin.temas.index')
        ->with('info','El tema se eliminó correctamente.');
    }
}
