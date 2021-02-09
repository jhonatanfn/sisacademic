<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tema;
use App\Models\Programacion;
use App\Models\Image;
use App\Http\Requests\TemaRequest;
use Illuminate\Support\Facades\Storage;

class TemaController extends Controller
{
    public function __construct()
     {
         $this->middleware('permission:tema-list|tema-create|tema-edit|tema-delete', ['only' => ['index','show']]);
         $this->middleware('permission:tema-create', ['only' => ['create','store']]);
         $this->middleware('permission:tema-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tema-delete', ['only' => ['destroy']]);
     } 

    public function index()
    {
        $temas= Tema::where('user_id',auth()->user()->id)->paginate(10);
        return view('admin.temas.index',compact('temas'));
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
        return view('admin.temas.create',compact('programacionlist'));
    }

    public function store(TemaRequest $request)
    {
        $tema=Tema::create($request->all());

        if($request->file('file')){
            $url= Storage::put('imagenes', $request->file('file'));
            $tema->image()->create([
                'url'=>$url
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
        $this->authorize('author',$tema);
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

        return view('admin.temas.edit',compact('tema','programacionlist'));
    }

    public function update(TemaRequest $request, Tema $tema)
    {
        $this->authorize('author',$tema);
        $tema->update($request->all());
        
        if($request->file('file')){
            $url= Storage::put('imagenes', $request->file('file'));
            if($tema->image){
                Storage::delete($tema->image->url);
                $tema->image->update([
                    'url'=>$url
                ]);
            }else{
                $tema->image()->create([
                    'url'=>$url
                ]);
            }
        }
        
        return redirect()->route('admin.temas.edit',$tema)
        ->with('actualizar','El tema se actualizó correctamente.');
    }

  
    public function destroy(Tema $tema)
    {
        $this->authorize('author',$tema);
        $tema->delete();
        return redirect()->route('admin.temas.index')
        ->with('info','El tema se eliminó correctamente.');
    }
}
