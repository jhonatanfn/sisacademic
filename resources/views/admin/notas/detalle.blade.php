@extends('adminlte::page')

@section('title', 'Notas')

@section('content_header')
    <h1>Lista de Notas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-striped" id="programacions">
            <thead>
              <tr>
                <th>Id</th>
                <th>Alumno</th>
                <th>Tipo evaluacion</th>
                <th>Situacion</th>
                <th>Nota</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($notas as $nota)
                  <tr>
                    <td>{{$nota->id}}</td>
                    <td>{{$nota->matricula->alumno->persona->nombres}}
                        {{$nota->matricula->alumno->persona->apellidos}}
                    </td>
                    <td>{{$nota->tipoevaluacion->nombre}}</td>
                    <td>{{$nota->situacion->nombre}}</td>
                    <td>{{$nota->nota}}</td>
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