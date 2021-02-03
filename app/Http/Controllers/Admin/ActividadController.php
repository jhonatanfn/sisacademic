<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Estado;
use App\Http\Requests\ValidationActividad;
use App\Models\Image;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades= Actividad::all();
        return view('admin.actividads.index',compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::all();
        $cursos=Curso::all();
        $estados=Estado::all();
        return view('admin.actividads.create',compact('categorias','cursos','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationActividad $request)
    {
        $actividad=Actividad::create($request->all());
        if($request->file('file')==null){
            Image::create([
                'url'=>'actividades/'.\Faker\Provider\Image::image(public_path('storage\actividades'),640,480,null,false),
                'imageable_id'=>$actividad->id,
                'imageable_type'=>Actividad::class
            ]);
        }else{
            $url= $request->file('file')->store('actividades');
            Image::create([
                'url'=>$url,
                'imageable_id'=>$actividad->id,
                'imageable_type'=>Actividad::class
            ]);
        }
       
        return redirect()->route('admin.actividads.edit',$actividad)
        ->with('guardar','La actividad se guardó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        return view('admin.actividads.show',compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)
    {
        $categorias=Categoria::all();
        $cursos=Curso::all();
        $estados=Estado::all();
        return view('admin.actividads.edit',compact('actividad','cursos','categorias','estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Actividad $actividad,ValidationActividad $request)
    {
        if($request->file('file')==null){
            $actividad->update($request->all());
        }else{
            $url= $request->file('file')->store('actividades');
            $actividad->image()->update([
                'url'=>$url
            ]);
        }
        
        return redirect()->route('admin.actividads.edit',$actividad)
        ->with('actualizar','La actividad se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return redirect()->route('admin.actividads.index')
        ->with('info','La actividad se eliminó correctamente.');
    
    }
}
