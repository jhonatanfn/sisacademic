<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Reunion;

class AsistenciaController extends Controller
{
    
    public function index()
    {
        $reuniones= Reunion::where('user_id',auth()->user()->id)->get();
        return view('admin.asistencias.index',compact('reuniones'));
    }

    public function detalle(Reunion $reunion){
        $asistencias= $reunion->asistencias()->get();
        return view('admin.asistencias.detalle',compact('asistencias'));
    }

    public function create()
    {
        return view('admin.asistencias.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Asistencia $asistencia)
    {
        return view('admin.asistencias.show',compact('reunion'));
    }

    public function edit(Asistencia $asistencia)
    {
        return view('admin.asistencias.edit',compact('asistencia'));
    }

    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
