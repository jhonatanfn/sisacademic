@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Editar Docente</h1>
@stop

@section('content')
  
    <div class="card">
        <div class="card-body">
            {!! Form::model($docente,['route'=>['admin.docentes.update',$docente],'method'=>'put','class'=>'formulario-update']) !!}
        
            <div class="form-group">
                {!! Form::label('dni', 'Dni') !!}
                {!! Form::text('dni', $docente->persona->dni, ['class'=>'form-control',
                'placeholder'=>'Ingrese el DNI del docente']) !!}
                @error('dni')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('nombres', 'Nombres') !!}
                {!! Form::text('nombres', $docente->persona->nombres, ['class'=>'form-control',
                'placeholder'=>'Ingrese el nombres del docente']) !!}
                @error('nombres')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos') !!}
                {!! Form::text('apellidos', $docente->persona->apellidos, ['class'=>'form-control',
                'placeholder'=>'Ingrese los Apellidos del docente']) !!}
                @error('apellidos')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('direccion', 'Dirección') !!}
                {!! Form::text('direccion', $docente->persona->direccion, ['class'=>'form-control',
                'placeholder'=>'Ingrese la Dirección del docente']) !!}
                @error('direccion')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('telefono', 'Teléfono') !!}
                {!! Form::text('telefono', $docente->persona->telefono, ['class'=>'form-control',
                'placeholder'=>'Ingrese el Teléfono del docente']) !!}
                @error('telefono')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', $docente->persona->email, ['class'=>'form-control',
                'placeholder'=>'Ingrese el Email del docente']) !!}
                @error('email')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            {!! Form::submit('Actualizar docente', ['class'=>'btn btn-primary']) !!}
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