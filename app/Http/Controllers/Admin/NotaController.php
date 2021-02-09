<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Periodo;
use App\Models\Programacion;

class NotaController extends Controller
{
    public function __construct()
     {
         $this->middleware('permission:nota-list|nota-create|nota-edit|nota-delete', ['only' => ['index','show']]);
         $this->middleware('permission:nota-create', ['only' => ['create','store']]);
         $this->middleware('permission:nota-edit', ['only' => ['edit','update','detalle']]);
         $this->middleware('permission:nota-delete', ['only' => ['destroy']]);
     } 

    public function index()
    {
        $periodo= Periodo::where('status',1)->first();
        if(auth()->user()->id != 1){
             $programacions= $periodo->programacions()
            ->where('docente_id',auth()->user()->persona->docente->id)
            ->get();
        }else{
            $programacions= $periodo->programacions()->paginate(10);
        }
     
        return view('admin.notas.index',compact('programacions')); 
    }

    public function detalle(Programacion $programacion)
    {
        $matriculas= $programacion->matriculas()->get();
        $notas=array();
        foreach($matriculas as $matricula){
            $lista=$matricula->notas()->get();
            foreach($lista as $item){
                array_push($notas,$item);
            }
        }
        return view('admin.notas.detalle',compact('notas'));
    }
    public function create()
    {
        return view('admin.notas.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Nota $nota)
    {
        return view('admin.notas.show',compact('nota'));
    }

    public function edit(Nota $nota)
    {
        return view('admin.notas.edit',compact('nota'));
    }

    public function update(Request $request, Nota $nota)
    {
        //
    }

    public function destroy(Nota $nota)
    {
        //
    }
}
