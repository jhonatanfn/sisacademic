<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Programacion;
use Illuminate\Http\Request;
use App\Models\Reunion;
use App\Models\User;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('reuniones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reunion $reunion)
    {
        $similares= array();
        $reunions= Reunion::where('id','!=',$reunion->id)->get();
        foreach($reunions as $item){
            if($item->programacion->curso->id==$reunion->programacion->curso->id){
                    array_push($similares,$item);
            }
        }

       /*  $similares=Reunion::where('programacion_id',$reunion->programacion_id)
        ->where('id','!=',$reunion->id)
        ->latest('id')
        ->take(4)
        ->get(); */

        $comentarios=$reunion->comments()->latest('id')->get();
    
        return view('reuniones.show',compact('reunion','similares','comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function usuario(User $user){
        $reuniones= $user->reunions()->paginate(5);
        
        return view('reuniones.usuario',compact('user','reuniones'));
    }
}
