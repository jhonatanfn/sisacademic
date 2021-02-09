@extends('adminlte::page')
@section('title', 'Comunicados')
@section('content_header')
  <h1>Agregar comunicado</h1>
@stop

@section('content')

    <div class="card">
      <div class="card-body">
        {!! Form::open(['route'=>'admin.comunicados.store','autocomplete'=>'off', 'files'=>true]) !!}
          
          @include('admin.comunicados.partials.form')

          {!! Form::submit('Crear comunicado', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <style>
      .image-wrapper{
          position: relative;
          padding-bottom: 56.25%;
      }
      .image-wrapper img{
          position: absolute;
          object-fit: cover;
          width: 100%;
          height: 100%;
      }
  </style>
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

  //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("picture").setAttribute('src', event.target.result); 
        };

        reader.readAsDataURL(file);
        }

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