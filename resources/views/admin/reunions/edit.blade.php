@extends('adminlte::page')
@section('title', 'Reuniones')
@section('content_header')
    <h1>Editar Reunion</h1>
@stop

@section('content')  
               
<div class="card">
  <div class="card-body">
    {!! Form::model($reunion,['route'=>['admin.reunions.update',$reunion],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
      
      @include('admin.reunions.partials.form')
      
      {!! Form::submit('Actualizar reunion', ['class'=>'btn btn-primary']) !!}
    
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
        .create( document.querySelector( '#objetivo' ) )
        .catch( error => {
            console.error( error );
      });
      ClassicEditor
        .create( document.querySelector( '#contenido' ) )
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