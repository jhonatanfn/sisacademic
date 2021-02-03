<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Actividad;
use App\Models\Comment;

class ComunicadoController extends Controller
{
    use WithPagination;
    
    public function index()
    {
        $categorias= Categoria::all();
        return view('comunicados.index',compact('categorias'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Comunicado $comunicado)
    {
        $categorias= Categoria::all();
        if(auth()->user()==null){
            $similares=Comunicado::where('categoria_id',$comunicado->categoria_id)
            ->where('status',2)
            ->where('id','!=',$comunicado->id)
            ->where('estado_id',1)
            ->latest('id')
            ->take(4)
            ->get();
        }else{
            $similares=Comunicado::where('categoria_id',$comunicado->categoria_id)
            ->where('status',2)
            ->where('id','!=',$comunicado->id)
            ->latest('id')
            ->take(4)
            ->get();
        }
        $comentarios=$comunicado->comments()->latest('id')->get();
        
      
        return view('comunicados.show',compact('comunicado','similares','comentarios','categorias'));
    }

    public function categoria(Categoria $categoria){
        $categorias= Categoria::all();
        if(auth()->user()==null){
            $comunicados= Comunicado::where('categoria_id',$categoria->id)
            ->where('status',2)
            ->where('estado_id',1)
            ->latest('id')
            ->paginate(5);
        }else{
            $comunicados= Comunicado::where('categoria_id',$categoria->id)
            ->where('status',2)
            ->latest('id')
            ->paginate(5);
        }
      
        return view('comunicados.categoria',compact('comunicados','categoria','categorias'));
    }

    public function edit(Comunicado $comunicado)
    {
        //
    }

    public function update(Request $request, Comunicado $comunicado)
    {
        //
    }

    public function destroy(Comunicado $comunicado)
    {
        //
    }

    public function estado(Estado $estado){
        $categorias= Categoria::all();

        if(auth()->user()==null){
            $comunicados= $estado->comunicados()
            ->where('status',2)
            ->where('estado_id',1)
            ->latest('id')
            ->paginate(5);
        }else{
            $comunicados= $estado->comunicados()
            ->where('status',2)
            ->latest('id')
            ->paginate(5);
        }
        
        return view('comunicados.estado',compact('comunicados','estado','categorias'));
      }

      public function publicar(Comunicado $comunicado,Request $request){
        
        $request->validate([
            'comentario'=>'required',
        ]);
        Comment::create([
            'mensaje'=>$request->comentario,
            'commentable_id'=>$comunicado->id,
            'commentable_type'=>Comunicado::class,
            'user_id'=>auth()->user()->id,
        ]);
        return redirect()->route('comunicados.show',compact('comunicado'));
      }
}
