@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Editar Alumno</h1>
@stop

@section('content')  
               
<div class="card">
  <div class="card-body">
    {!! Form::model($alumno,['route'=>['admin.alumnos.update',$alumno],'method'=>'put','class'=>'formulario-update']) !!}
      
    <div class="form-group">
      {!! Form::label('dni', 'Dni') !!}
      {!! Form::text('dni', $alumno->persona->dni, ['class'=>'form-control',
      'placeholder'=>'Ingrese el DNI del padre de familia']) !!}
      @error('dni')
        <span class="text-danger">{{$message}}</span>
      @enderror
  </div>
  
  <div class="form-group">
      {!! Form::label('nombres', 'Nombres') !!}
      {!! Form::text('nombres',  $alumno->persona->nombres, ['class'=>'form-control',
      'placeholder'=>'Ingrese el nombres del padre de familia']) !!}
      @error('nombres')
        <span class="text-danger">{{$message}}</span>
      @enderror
  </div>
  
  <div class="form-group">
      {!! Form::label('apellidos', 'Apellidos') !!}
      {!! Form::text('apellidos',  $alumno->persona->apellidos, ['class'=>'form-control',
      'placeholder'=>'Ingrese los Apellidos del padre de familia']) !!}
      @error('apellidos')
        <span class="text-danger">{{$message}}</span>
      @enderror
  </div>
  
  <div class="form-group">
      {!! Form::label('direccion', 'Dirección') !!}
      {!! Form::text('direccion',  $alumno->persona->direccion, ['class'=>'form-control',
      'placeholder'=>'Ingrese la Dirección del padre de familia']) !!}
      @error('direccion')
        <span class="text-danger">{{$message}}</span>
      @enderror
  </div>
  
  <div class="form-group">
      {!! Form::label('telefono', 'Teléfono') !!}
      {!! Form::text('telefono',  $alumno->persona->telefono, ['class'=>'form-control',
      'placeholder'=>'Ingrese el Teléfono del padre de familia']) !!}
      @error('telefono')
        <span class="text-danger">{{$message}}</span>
      @enderror
  </div>
  
  <div class="form-group">
      {!! Form::label('email', 'Email') !!}
      {!! Form::text('email',  $alumno->persona->email, ['class'=>'form-control',
      'placeholder'=>'Ingrese el Email del padre de familia']) !!}
      @error('email')
        <span class="text-danger">{{$message}}</span>
      @enderror
  </div>
        
  <div class="form-group">
    {!! Form::label('dnip', 'DNI Padre') !!}
    {!! Form::text('dnip',  $dnip, ['class'=>'form-control',
    'placeholder'=>'Ingrese el DNI del padre']) !!}
    @error('dnip')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  {!! Form::submit('Actualizar alumno', ['class'=>'btn btn-primary']) !!}
    
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