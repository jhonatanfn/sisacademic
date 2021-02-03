@extends('adminlte::page')

@section('title', 'Padres')

@section('content_header')
    <h1>Crear Padre de Familia</h1>
@stop

@section('content')
    
  <div class="card">
        <div class="card-body">
        {!! Form::open(['route'=>'admin.padres.store','class'=>'formulario-save']) !!}
        <div class="form-group">
          {!! Form::label('dni', 'Dni') !!}
          {!! Form::text('dni', null, ['class'=>'form-control',
          'placeholder'=>'Ingrese el DNI del padre de familia']) !!}
          @error('dni')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      
      <div class="form-group">
          {!! Form::label('nombres', 'Nombres') !!}
          {!! Form::text('nombres',  null, ['class'=>'form-control',
          'placeholder'=>'Ingrese el nombres del padre de familia']) !!}
          @error('nombres')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      
      <div class="form-group">
          {!! Form::label('apellidos', 'Apellidos') !!}
          {!! Form::text('apellidos',  null, ['class'=>'form-control',
          'placeholder'=>'Ingrese los Apellidos del padre de familia']) !!}
          @error('apellidos')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      
      <div class="form-group">
          {!! Form::label('direccion', 'Dirección') !!}
          {!! Form::text('direccion',  null, ['class'=>'form-control',
          'placeholder'=>'Ingrese la Dirección del padre de familia']) !!}
          @error('direccion')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      
      <div class="form-group">
          {!! Form::label('telefono', 'Teléfono') !!}
          {!! Form::text('telefono',  null, ['class'=>'form-control',
          'placeholder'=>'Ingrese el Teléfono del padre de familia']) !!}
          @error('telefono')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      
      <div class="form-group">
          {!! Form::label('email', 'Email') !!}
          {!! Form::text('email',  null, ['class'=>'form-control',
          'placeholder'=>'Ingrese el Email del padre de familia']) !!}
          @error('email')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
            {!! Form::submit('Crear padre', ['class'=>'btn btn-primary']) !!}
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