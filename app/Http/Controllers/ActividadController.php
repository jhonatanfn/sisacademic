<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Actividad;
use App\Models\Curso;

class ActividadController extends Controller
{
    use WithPagination;
    
    public function index()
    {
        $categorias= Categoria::all();
        /* if(auth()->user()==null){
            $actividades= Actividad::where('status',2)
            ->where('estado_id',1)
            ->latest('id')->paginate(5);
        }else{
            $actividades= Actividad::where('status',2)
            ->latest('id')->paginate(5);
        } */
        return view('actividades.index',compact('categorias'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Actividad $actividad)
    {
        if(auth()->user()==null){
            $similares=Actividad::where('categoria_id',$actividad->categoria_id)
            ->where('status',2)
            ->where('id','!=',$actividad->id)
            ->where('estado_id',1)
            ->latest('id')
            ->take(4)
            ->get();
        }else{
            $similares=Actividad::where('categoria_id',$actividad->categoria_id)
            ->where('status',2)
            ->where('id','!=',$actividad->id)
            ->latest('id')
            ->take(4)
            ->get();
        }
        $comentarios=$actividad->comments()->get();
        return view('actividades.show',compact('actividad','similares','comentarios'));
    }

    public function categoria(Categoria $categoria){
        $actividades= Actividad::where('categoria_id',$categoria->id)
                ->where('status',2)
                ->latest('id')
                ->paginate(6);
        return view('actividades.categoria',compact('actividades','categoria'));
    }

    public function edit(Actividad $actividad)
    {
        //
    }

    public function update(Request $request, Actividad $actividad)
    {
        //
    }

    public function destroy(Actividad $actividad)
    {
        //
    }

    public function estado(Estado $estado){
        $actividades= $estado->actividads()
        ->where('status',2)->latest('id')
        ->paginate(4);
        return view('actividades.estado',compact('actividades','estado'));
    }

      public function curso(Curso $curso){
        $actividades= $curso->actividads()
        ->where('status',2)->latest('id')
        ->paginate(4);
        return view('actividades.curso',compact('actividades','curso'));
      }
}
