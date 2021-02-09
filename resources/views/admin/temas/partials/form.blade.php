
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
    {!! Form::text('titulo', null, ['class'=>'form-control','placeholder'=>'Ingrese el titulo del tema']) !!}
    @error('titulo')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
  {!! Form::label('slug', 'Slug') !!}
  {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug del tema','readonly']) !!}
  @error('slug')
    <span class="text-danger">{{$message}}</span>
  @enderror
</div>

<div class="row mb-3">
  <div class="col">
    <div class="image-wrapper">
      @isset ($tema->image)
        <img id="picture" src="{{Storage::url($tema->image->url)}}" alt="">
      @else
        <img id="picture" src="{{Storage::url('default/tema.jpg')}}" alt="">
      @endisset
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      {!! Form::label('file', 'Imagen del tema') !!}
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

