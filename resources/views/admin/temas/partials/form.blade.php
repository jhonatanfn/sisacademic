{!! Form::hidden('user_id',auth()->user()->id) !!}

<div class="form-group">
  <div class="form-group">
        {!! Form::label('programacion_id', 'Cursos') !!}
        <select name="programacion_id" id="programacion_id" class="form-control">
          @foreach ($cursos as $curso)
            <option value="{{$curso->id}}">{{$curso->curso->nombre}}</option>
          @endforeach
        </select>
    @error('programacion_id')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>

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
  {!! Form::label('proposito', 'Proposito') !!}
  {!! Form::textarea('proposito', null, ['class'=>'form-control']) !!}            
  @error('proposito')
          <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  {!! Form::label('contenido', 'Contenido') !!}
  {!! Form::textarea('contenido', null, ['class'=>'form-control']) !!}             
  @error('contenido')
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
