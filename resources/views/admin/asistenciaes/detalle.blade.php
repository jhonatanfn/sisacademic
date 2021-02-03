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
                    <th>Curso</th>
                    <th>Periodo</th>
                    <th>Alumno</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($asistenciaes as $asistencia)
                      <tr>
                        <td>{{$asistencia->id}}</td>
                        <td>{{$asistencia->matricula->programacion->curso->nombre}}</td>
                        <td>
                            {{$asistencia->matricula->programacion->periodo->nombre}}
                        </td>
                        <td>{{$asistencia->matricula->alumno->persona->nombres}} 
                            {{$asistencia->matricula->alumno->persona->apellidos}}</td>
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