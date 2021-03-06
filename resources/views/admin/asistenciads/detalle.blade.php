@extends('adminlte::page')

@section('title', 'Asistencias')

@section('content_header')
    <h1>Lista de Asistencias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped" id="reunions">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Docente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($asistencias as $asistencia)
                      <tr>
                        <td>{{$asistencia->id}}</td>
                        <td>{{$asistencia->programacion->docente->persona->nombres}} 
                            {{$asistencia->programacion->docente->persona->apellidos}}</td>
                        <td>{{$asistencia->fecha}}</td> 
                        <td>{{$asistencia->hora}}</td> 
                        <td>{{$asistencia->status}}</td>                            
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop