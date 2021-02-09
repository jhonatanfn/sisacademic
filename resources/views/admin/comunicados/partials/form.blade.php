
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

  <div class="row mb-3">
    <div class="col">
      <div class="image-wrapper">
        @isset ($comunicado->image)
          <img id="picture" src="{{Storage::url($comunicado->image->url)}}" alt="">
        @else
          <img id="picture" src="{{Storage::url('default/comunicado.jpg')}}" alt="">
        @endisset
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        {!! Form::label('file', 'Imagen del comunicado') !!}
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

  <div class="form-group ">
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

