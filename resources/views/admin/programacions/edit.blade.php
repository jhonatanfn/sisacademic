@extends('adminlte::page')
@section('title', 'Programacions')
@section('content_header')
    <h1>Editar Programacion</h1>
@stop

@section('content')  
               
<div class="card">
  <div class="card-body">
    {!! Form::model($programacion,['route'=>['admin.programacions.update',$programacion],'method'=>'put'/* ,'class'=>'formulario-update' */,'enctype'=>'multipart/form-data']) !!}
      
      @include('admin.programacions.partials.form')
      
      {!! Form::submit('Actualizar programacion', ['class'=>'btn btn-primary']) !!}
    
    {!! Form::close() !!}
  </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    @if (session('guardar'))
      <script>
        Swal.fire(
              'Guardado',
              '{{session('guardar')}}',
              'success'
            )
      </script>
    @endif

    @if (session('actualizar'))
      <script>
        Swal.fire(
              'Actualizado',
              '{{session('actualizar')}}',
              'success'
            )
      </script>
    @endif

    <script>
        $('.formulario-update').submit(function(e){
            e.preventDefault();
            Swal.fire({
              title: 'Desea actualizar este registro?',
              showDenyButton: true,
              showCancelButton: true,
              confirmButtonText: `Actualizar`,
              denyButtonText: `No Actualizar`,
              cancelButtonText: `Cancelar`,
            }).then((result) => {
              if (result.isConfirmed) {
                this.submit();
              } else if (result.isDenied) {
              }
            })
        });
      
      </script>
@stop