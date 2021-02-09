@extends('adminlte::page')

@section('title', 'Asistencias')

@section('content_header')
    <h1>Lista de Asistencias</h1>
@stop

@section('content')
  
<div class="card">
 
    <div class="card-body table-responsive">
      <table class="table table-striped" id="programacions">
        <thead>
          <tr>
            <th>Id</th>
            <th>Curso</th>
            <th>Docente</th>
            <th>Periodo</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($programacions as $programacion)
              <tr>
                <td>{{$programacion->id}}</td>
                <td>{{$programacion->curso->nombre}}</td>
                <td>{{$programacion->docente->persona->nombres}} 
                    {{$programacion->docente->persona->apellidos}}</td>
                <td>{{$programacion->periodo->nombre}}</td>
                <td>{{$programacion->periodo->status}}</td>
                <td width="50px">
                  @can('asistenciaalumno-edit')
                    <a class="btn btn-sm btn-primary" 
                    href="{{route('admin.asistenciaes.detalle',$programacion)}}">
                    Asistencias</a>
                  @endcan
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script>
      $('#programacions').DataTable({
          responsive:true,
          autowidth:false,
          "language": {
              "lengthMenu": "Mostrar _MENU_ registros por página",
              "zeroRecords": "No se encontraron registros",
              "info": "Mostrando la página _PAGE_ de _PAGES_",
              "infoEmpty": "No records available",
              "infoFiltered": "(filtrado de _MAX_ registros totales)",
              "search": "Buscar:",
              "paginate":{
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
          }
      });
  </script>

@stop