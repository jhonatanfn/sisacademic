<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del rol']) !!}
    @error('name')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Permisos:</p>
        @foreach ($permissions as $permission)
            {{-- <label class="mr-2">
                {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                {{$permission->name}}
            </label> --}}
            <div class="custom-control custom-checkbox">
                {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                {{$permission->name}}
            </div>
        @endforeach
        @error('permissions')
            <br>
            <small class="text-danger">{{$message}}</small>
        @enderror
</div>
