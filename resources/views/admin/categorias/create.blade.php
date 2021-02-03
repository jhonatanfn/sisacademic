@extends('adminlte::page')
@section('title', 'Categorias')
@section('content_header')
<h1>Crear Categoria</h1>
@stop
@section('content')

<div class="card">
  <div class="card-body">
    {!! Form::open(['route'=>'admin.categorias.store','class'=>'formulario-save']) !!}

      <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, 
        ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la categoria']) !!}
        @error('nombre')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="form-group">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug de la categoria','readonly']) !!}
        @error('slug')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      {!! Form::submit('Crear categoria', ['class'=>'btn btn-primary']) !!}

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