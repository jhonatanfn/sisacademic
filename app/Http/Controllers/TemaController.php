<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema;
use App\Models\User;

class TemaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('temas.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tema $tema)
    {
        $similares= array();
        $temas= Tema::where('id','!=',$tema->id)->get();
        foreach($temas as $item){
            if($item->programacion->curso->id==$tema->programacion->curso->id){
                    array_push($similares,$item);
            }
        }

        $comentarios=$tema->comments()->latest('id')->get();
    
        return view('temas.show',compact('tema','similares','comentarios'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function usuario(User $user){
        
        $temas= $user->temas()->paginate(5);
        return view('temas.usuario',compact('user','temas'));

    }
}
