<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comunicado;
use App\Models\Categoria;
use App\Http\Requests\ComunicadoRequest;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.comunicados.create', compact('categorias'));
    }

    public function store(ComunicadoRequest $request){
       
        $comunicado=Comunicado::create($request->all());
        
        if($request->file('file')){
            $url= Storage::put('imagenes', $request->file('file'));
            $comunicado->image()->create([
                'url'=>$url
            ]);
        }
        return redirect()->route('admin.comunicados.edit',$comunicado)
        ->with('guardar','El comunicado se guardó correctamente.'); 

    }

    public function edit(Comunicado $comunicado){
        $this->authorize('author',$comunicado);
        $categorias= Categoria::pluck('nombre','id');
        return view('admin.comunicados.edit', compact('comunicado','categorias'));
    }

    public function update(Comunicado $comunicado,ComunicadoRequest $request){
        $this->authorize('author',$comunicado);
        $comunicado->update($request->all());

        if($request->file('file')){
            $url= Storage::put('imagenes', $request->file('file'));
            if($comunicado->image){
                Storage::delete($comunicado->image->url);
                $comunicado->image->update([
                    'url'=>$url
                ]);
            }else{
                $comunicado->image()->create([
                    'url'=>$url
                ]);
            }
        }

        return redirect()->route('admin.comunicados.edit',$comunicado)
        ->with('actualizar','El comunicado se actualizó correctamente.');

    }

    public function destroy(Comunicado $comunicado){
        $this->authorize('author',$comunicado);
        $comunicado->delete();
        return redirect()->route('admin.comunicados.index')
        ->with('info','El comunicado se eliminó correctamente.');
    }
}
