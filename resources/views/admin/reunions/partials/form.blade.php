<div class="form-group">
  <div class="form-group">
    {!! Form::label('programacion_id', 'Cursos') !!}
        <select name="programacion_id" id="programacion_id" class="form-control">
          @foreach ($programacionlist as $programacion)
            <option value="{{$programacion->id}}">{{$programacion->curso->nombre}}</option>
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
  {!! Form::label('fecha', 'Fecha') !!}
  {!! Form::date('fecha', null, ['class'=>'form-control']) !!}
  @error('fecha')
    <span class="text-danger">{{$message}}</span>
  @enderror
</div>

<div class="form-group">
  {!! Form::label('hora', 'Hora') !!}
 {!! Form::time('hora', null, ['class'=>'form-control']) !!}
  @error('hora')
    <span class="text-danger">{{$message}}</span>
  @enderror
</div>

<div class="row mb-3">
  <div class="col">
    <div class="image-wrapper">
      @isset ($reunion->image)
        <img id="picture" src="{{Storage::url($reunion->image->url)}}" alt="">
      @else
        <img id="picture" src="{{Storage::url('default/reunion.jpg')}}" alt="">
      @endisset
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      {!! Form::label('file', 'Imagen de la reunion') !!}
      {!! Form::file('file', ['class'=>'form-control-file','accept'=>'image/*']) !!}
      
      @error('file')
        <span class="text-danger">{{$message}}</span>
      @enderror
    
    </div>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. 
      Consequatur aut a necessitatibus modi. 
      In perspiciatis aut deleniti velit ratione praesentium aliquid, 
      magnam inventore. Excepturi ducimus accusantium totam aliquam non? 
      Necessitatibus!
    </p>
  </div>
  
</div>

<div class="form-group">
  {!! Form::label('objetivo', 'Objetivo') !!}
  {!! Form::textarea('objetivo', null, ['class'=>'form-control']) !!}            
  @error('objetivo')
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
