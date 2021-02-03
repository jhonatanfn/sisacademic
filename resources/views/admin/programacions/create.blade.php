@extends('adminlte::page')

@section('title', 'Programacions')

@section('content_header')
    <h1>Crear Programacion</h1>
@stop

@section('content')
  
<div class="card">
  <div class="card-body">
    {!! Form::open(['route'=>'admin.programacions.store'/*, 'class'=>'formulario-save' */]) !!}
      
      @include('admin.programacions.partials.form')
      
      {!! Form::submit('Crear programacion', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  $('.formulario-save').submit(function(e){
      e.preventDefault();
      Swal.fire({
        title: 'Desea guardar este registro?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Guardar`,
        denyButtonText: `No guardar`,
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        } else if (result.isDenied) {
        }
      })
  });
</script>

@stop