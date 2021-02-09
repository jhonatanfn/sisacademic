@extends('adminlte::page')
@section('title', 'Users')
@section('content_header')
@can('usuario-create')
  <a class="btn btn-sm btn-secondary float-right" 
  href="{{route('admin.users.create')}}">
  Agregar Usuario</a>
@endcan
<h1>Listado de Usuarios</h1>
@stop
@section('content')

<div class="card">
  
  <div class="card-body table-responsive">
    <table class="table table-striped" id="users">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Email</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td width="50px">
                @can('usuario-edit')
                <a class="btn btn-sm btn-primary" 
                href="{{route('admin.users.edit',$user)}}">
                Editar</a>
                @endcan
              </td>
              <td width="50px">
                @can('usuario-delete', Model::class)
                  <form action="{{route('admin.users.destroy',$user)}}" 
                  method="post" class="formulario-eliminar">
                  @csrf 
                  @method('delete') 
                  <button type="submit" class="btn btn-danger btn-sm">
                  Eliminar</button>
                  </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
      $('#users').DataTable({
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

<script>    
  $('.formulario-eliminar').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: 'Desea eliminar este registro?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar',
    
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    })
    });
</script>

@if (session('info'))
  <script>
    Swal.fire(
          'Eliminado',
          '{{session('info')}}',
          'success'
        )
  </script>
@endif

@stop