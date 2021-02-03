{{-- <div class="antialiased font-sans bg-gray-200">
  <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        
        <div class="my-2 flex sm:flex-row flex-col">
            <div class="flex flex-row mb-1 sm:mb-0">
                <div class="relative">
                    <select 
                        wire:model="periodo_id" 
                        class="h-full rounded-l border block appearance-none 
                        w-full bg-white border-gray-400 text-gray-700 py-2 
                        px-4 pr-8 leading-tight focus:outline-none 
                        focus:bg-white focus:border-gray-500">
                        @foreach ($periodos as $periodo)
                        <option value="{{$periodo->id}}">{{$periodo->nombre}}</option>
                        @endforeach                                            
                    </select>
                </div>
                <div class="relative">
                    <select 
                        wire:model="curso_id"                        
                        class="h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                        @foreach ($cursos as $curso)
                        <option value="{{$curso->id}}">
                          {{$curso->nombre}}</option>
                        @endforeach     
                    </select>
                </div>           
            </div>
        </div>
   

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Curso
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Tipo Evaluacion
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nota
                            </th>                         
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Situacion
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notas as $nota)
                            
                        <tr>  
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$nota->matricula->programacion->curso->nombre}}</p>
                            </td>                      
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$nota->tipoevaluacion->nombre}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                   {{$nota->nota}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative">{{$nota->situacion->nombre}}</span>
                                </span>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <div
                    class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                   {{$notas->links()}}
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
 --}}




  <div class="w-full relative mt-4 shadow-2xl rounded my-24 overflow-hidden">
    <div class="top h-64 w-full bg-blue-400 overflow-hidden relative" >
      <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
        <img src="{{Storage::url('images/qweasdzxcpoiñlkmnb542185.png')}}" 
        class="h-24 w-24 object-cover rounded-full">
        <h1 class="text-2xl font-semibold">{{$alumno->persona->nombres}} 
          {{$alumno->persona->apellidos}}</h1>
      </div>
    </div>
    
    <div class="grid grid-cols-12 bg-white ">
      <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">
        <a href="#" 
        class="text-sm p-2 bg-indigo-900 
        text-white text-center rounded font-bold">Notas</a>
      </div>
  
      <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
          <div class="flex flex-col space-y-8">
            @foreach ($matriculas as $matricula) 
            <div class="form-item w-full">
                
              <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse"> 
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold 
                      uppercase text-sm text-grey-dark border-b 
                      border-grey-light">Periodo</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold 
                      uppercase text-sm text-grey-dark border-b 
                      border-grey-light">Curso</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold 
                      uppercase text-sm text-grey-dark border-b 
                      border-grey-light">Docente</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold 
                      uppercase text-sm text-grey-dark border-b 
                      border-grey-light">Tipo Evaluacion</th>
                      <th class="py-4 px-6 bg-grey-lightest 
                      font-bold uppercase text-sm text-grey-dark 
                      border-b border-grey-light">Nota</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($matricula->notas as $nota)
                        
                    <tr class="hover:bg-grey-lighter">
                      <td class="py-4 px-6 border-b border-grey-light">
                        {{$nota->matricula->programacion->periodo->nombre}}</td>
                      <td class="py-4 px-6 border-b border-grey-light">
                          {{$nota->matricula->programacion->curso->nombre}}</td>
                      <td class="py-4 px-6 border-b border-grey-light">
                          {{$nota->matricula->programacion->docente->persona->nombres}}
                          {{$nota->matricula->programacion->docente->persona->apellidos}}
                      </td>
                      <td class="py-4 px-6 border-b border-grey-light">
                        {{$nota->tipoevaluacion->nombre}}</td>
                      <td class="py-4 px-6 border-b border-grey-light">
                        {{$nota->nota}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              
              
              {{-- <label class="text-xl ">
                  <span class="font-bold">Periodo: </span> {{$matricula->programacion->periodo->nombre}}
                </label>
                <br>
                <label class="text-xl">
                  <span class="font-bold">Curso: </span> {{$matricula->programacion->curso->nombre}}
                </label>
                <hr> --}}
              <div class="w-2/3 mx-auto">
           {{--      <div class="bg-white shadow-md rounded my-6">
                  <table class="text-left w-full border-collapse"> 
                    <thead>
                      <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold 
                        uppercase text-sm text-grey-dark border-b 
                        border-grey-light">Tipo Evaluacion</th>
                        <th class="py-4 px-6 bg-grey-lightest 
                        font-bold uppercase text-sm text-grey-dark 
                        border-b border-grey-light">Nota</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($matricula->notas as $nota)
                          
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">
                          {{$nota->tipoevaluacion->nombre}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                          {{$nota->nota}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div> --}}
              </div>
            </div>
            @endforeach
          </div>
          <div>
            {{$matriculas->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>