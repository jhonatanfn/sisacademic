<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationComunicado;
use App\Models\Comunicado;
use App\Models\Categoria;
use App\Models\Image;
use App\Models\Estado;
use App\Http\Requests\StoreComunicadoRequest;

class ComunicadoController extends Controller
{
    
     public function __construct()
     {
         $this->middleware('permission:comunicado-list|comunicado-create|comunicado-edit|comunicado-delete', ['only' => ['index','show']]);
         $this->middleware('permission:comunicado-create', ['only' => ['create','store']]);
         $this->middleware('permission:comunicado-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:comunicado-delete', ['only' => ['destroy']]);
     } 
    
    public function index(){
       
        $comunicados= Comunicado::where('user_id',auth()->user()->id)
        ->latest('id')
        ->get();
        return view('admin.comunicados.index',compact('comunicados'));
    }

    public function create(){
        $categorias= Categoria::pluck('nombre','id');
        $estados=Estado::pluck('nombre','id');
        return view('admin.comunicados.create', compact('categorias','estados'));
    }

    public function store(StoreComunicadoRequest $request){
       
        $comunicado=Comunicado::create($request->all());

        if($request->file('file')==null){
            Image::create([
                'url'=>'comunicados/'.\Faker\Provider\Image::image(public_path('storage\comunicados'),640,480,null,false),
                'imageable_id'=>$comunicado->id,
                'imageable_type'=>Comunicado::class
            ]);
        }else{
            $url= $request->file('file')->store('comunicados');
            Image::create([
                'url'=>$url,
                'imageable_id'=>$comunicado->id,
                'imageable_type'=>Comunicado::class
            ]);
        }
        return redirect()->route('admin.comunicados.edit',$comunicado)
        ->with('guardar','El comunicado se guardó correctamente.');
    }

    public function edit(Comunicado $comunicado){
        $categorias= Categoria::pluck('nombre','id');
        $estados=Estado::pluck('nombre','id');
        return view('admin.comunicados.edit', compact('comunicado','categorias','estados'));
    }

    public function update(Comunicado $comunicado,ValidationComunicado $request){
       
        if($request->file('file')==null){
            $comunicado->update($request->all());
        }else{
            $url= $request->file('file')->store('comunicados');
            $comunicado->image()->update([
                'url'=>$url
            ]);
        }
        
        return redirect()->route('admin.comunicados.edit',$comunicado)
        ->with('actualizar','El comunicado se actualizó correctamente.');
    }

    public function destroy(Comunicado $comunicado){
        $comunicado->delete();
        return redirect()->route('admin.comunicados.index')
        ->with('info','El comunicado se eliminó correctamente.');
    }
}
