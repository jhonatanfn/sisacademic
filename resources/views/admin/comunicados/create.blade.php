@extends('adminlte::page')
@section('title', 'Comunicados')
@section('content_header')
  <h1>Agregar comunicado</h1>
@stop

@section('content')

    <div class="card">
      <div class="card-body">
        {!! Form::open(['route'=>'admin.comunicados.store',/* 'class'=>'formulario-save', */'enctype'=>'multipart/form-data']) !!}
          
          @include('admin.comunicados.partials.form')

          {!! Form::submit('Crear comunicado', ['class'=>'btn btn-primary']) !!}

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
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

<script>
  $(document).ready( function() {
    $("#titulo").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });
  });
  ClassicEditor
        .create( document.querySelector( '#extracto' ) )
        .catch( error => {
            console.error( error );
  });
  ClassicEditor
        .create( document.querySelector( '#cuerpo' ) )
        .catch( error => {
            console.error( error );
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