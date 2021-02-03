<div class="form-group">
    {!! Form::label('curso_id', 'Cursos') !!}
    {!! Form::select('curso_id', $cursos, null, ['class'=>'form-control']) !!}
    @error('curso_id')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
         {!! Form::label('docente_id', 'Docentes') !!}
        <select name="docente_id" id="docente_id" class="form-control">
          @foreach ($docentes as $docente)
            <option value="{{$docente->id}}">{{$docente->persona->nombres}} 
                {{$docente->persona->apellidos}}</option>
          @endforeach
        </select>
    @error('docente_id')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('periodo_id', 'Periodos') !!}
    {!! Form::select('periodo_id', $periodos, null, ['class'=>'form-control']) !!}
    @error('periodo_id')
      <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Status:</p>
    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        No aceptado
    </label>
    <label class="mr-2">
        {!! Form::radio('status', 2, false) !!}
        Aceptado
    </label>
</div>