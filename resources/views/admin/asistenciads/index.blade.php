@extends('adminlte::page')

@section('title', 'Asistencias')

@section('content_header')
    <h1>Lista Asistencias</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body table-responsive">
      <table class="table table-striped" id="programacions">
        <thead>
          <tr>
            <th>Id</th>
            <th>Periodo</th>
            <th>Curso</th>
            <th>Docente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($asistenciads as $asistenciad)
              <tr>
                <td>{{$asistenciad->id}}</td>
                <td>{{$asistenciad->programacion->periodo->nombre}}</td>
                <td>{{$asistenciad->programacion->curso->nombre}}</td>
                <td>{{$asistenciad->programacion->docente->persona->nombres}} 
                    {{$asistenciad->programacion->docente->persona->apellidos}}</td>  
                <td>{{$asistenciad->fecha}}</td>
                <td>{{$asistenciad->hora}}</td>   
                <td>{{$asistenciad->status}}
                </td>         
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
    <script> console.log('Hi!'); </script>
@stop