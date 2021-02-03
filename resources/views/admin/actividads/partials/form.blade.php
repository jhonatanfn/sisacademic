<div class="form-group">
    {!! Form::label('titulo', 'Titulo') !!}
    {!! Form::text('titulo', null, ['class'=>'form-control','placeholder'=>'Ingrese el titulo de la actividad']) !!}
    @error('titulo')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug de la actividad','readonly']) !!}
    @error('slug')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('extracto', 'Extracto') !!}
    {!! Form::text('extracto', null, ['class'=>'form-control','placeholder'=>'Ingrese el extracto de la actividad']) !!}
    @error('extracto')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('enlace', 'Enlace') !!}
    {!! Form::text('enlace', null, ['class'=>'form-control','placeholder'=>'Ingrese el enlace de la actividad']) !!}
    @error('enlace')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="form-group">
      {!! Form::label('categoria_id', 'Categorias') !!}
      <select class="custom-select rounded-0" 
      id="categoria_id" name="categoria_id">
        @foreach ($categorias as $categoria)                                  
          <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
      </select>
  </div>

  <div class="form-group">
    {!! Form::label('curso_id', 'Cursos') !!}
    <select class="custom-select rounded-0" 
    id="curso_id" name="curso_id">
      @foreach ($cursos as $curso)                                  
        <option value="{{$curso->id}}">{{$curso->nombre}}</option>
      @endforeach
    </select>
</div>

  <div class="form-group">
    {!! Form::label('estado_id', 'Estados') !!}
    <select class="custom-select rounded-0" 
    id="estado_id" name="estado_id">
    @foreach ($estados as $estado)                                  
      <option value="{{$estado->id}}">
        {{$estado->nombre}}
      </option>
    @endforeach
    </select>
  </div>

  <div class="form-group">
    {!! Form::label('cuerpo', 'Cuerpo') !!}
    {!! Form::textarea('cuerpo', null, ['class'=>'form-control']) !!}
    @error('cuerpo')
      <span class="text-danger">{{$message}}</span>
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

  {!! Form::text('user_id',auth()->user()->id, ['hidden']) !!}
  {!! Form::text('status',2, ['hidden']) !!}