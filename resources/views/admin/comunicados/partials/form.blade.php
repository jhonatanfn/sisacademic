  {!! Form::hidden('user_id',auth()->user()->id) !!}

  <div class="form-group">
      {!! Form::label('titulo', 'Titulo') !!}
      {!! Form::text('titulo', null, ['class'=>'form-control','placeholder'=>'Ingrese el titulo del comunicado']) !!}
      @error('titulo')
        <span class="text-danger">{{$message}}</span>
      @enderror
  </div>

  <div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug del comunicado','readonly']) !!}
    @error('slug')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group">
      {!! Form::label('categoria_id', 'Categorias') !!}
      {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control']) !!}
      @error('categoria_id')
        <span class="text-danger">{{$message}}</span>
      @enderror
  </div>
  <div class="form-group">
    {!! Form::label('estado_id', 'Estados') !!}
    {!! Form::select('estado_id', $estados, null, ['class'=>'form-control']) !!}
    @error('estado_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group">
    <p class="font-weight-bold">Status:</p>
    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label class="mr-2">
        {!! Form::radio('status', 2, false) !!}
        Publicado
    </label>
  </div>
  <div class="form-group">
    {!! Form::label('extracto', 'Extracto') !!}
    {!! Form::textarea('extracto', null, ['class'=>'form-control']) !!}            
    @error('extracto')
            <small class="text-danger">{{$message}}</small>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('cuerpo', 'Cuerpo') !!}
    {!! Form::textarea('cuerpo', null, ['class'=>'form-control']) !!}             
    @error('cuerpo')
            <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="form-group">
    {!! Form::label('file', 'Imagen') !!}
    {!! Form::file('file',null,['class'=>'form-control','accept'=>'image/*']) !!}
    <br>
    @error('file')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
