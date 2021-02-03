<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del periodo']) !!}
    @error('nombre')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug del periodo','readonly']) !!}
    @error('slug')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('inicio', 'Inicio') !!}
    {!! Form::date('inicio', null, ['class'=>'form-control']) !!}
    @error('inicio')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fin', 'Final') !!}
    {!! Form::date('fin', null, ['class'=>'form-control']) !!}
    @error('fin')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Status:</p>
    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        Proceso
    </label>
    <label class="mr-2">
        {!! Form::radio('status', 2, false) !!}
        Terminado
    </label>
</div>