<div class="card">
        <div class="card-header">
            <button class="btn btn-sm btn-success" wire:click="guardar"> Guardar</button>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped" id="programacions">
                <thead>
                  <tr>
                    <th>Alumno</th>
                    <th>Tipo evaluación</th>
                    <th>Situación</th>
                    <th>Nota</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($notas as $nota)
                      <tr>
                        <td>{{$nota->matricula->alumno->persona->nombres}}
                            {{$nota->matricula->alumno->persona->apellidos}}
                        </td>
                        <td width="200px">
                            {!! Form::select('tipoevaluacion_id', 
                            $tipoevaluacions, 
                            $nota->tipoevaluacion->id, ['class'=>'form-control']) !!}
                        </td>
                        <td width="200px">
                            {!! Form::select('situacion_id', 
                            $situacions, 
                            $nota->situacion->id, ['class'=>'form-control']) !!}
                        </td>
                        <td width="100px">
                            {!! Form::text('nota', $nota->nota, ['class'=>'form-control']) !!}
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
</div>
