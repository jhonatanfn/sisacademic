@extends('adminlte::page')

@section('title', 'Periodos')

@section('content_header')
    <h1>Crear Periodo</h1>
@stop

@section('content')
  
<div class="card">
  <div class="card-body">
    {!! Form::open(['route'=>'admin.periodos.store'/* ,'class'=>'formulario-save' */]) !!}

      @include('admin.periodos.partials.form')

      {!! Form::submit('Crear periodo', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
  </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

<script>
  $(document).ready( function() {
  $("#nombre").stringToSlug({
      setEvents: 'keyup keydown blur',
      getPut: '#slug',
      space: '-'
  });
  });
</script>

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