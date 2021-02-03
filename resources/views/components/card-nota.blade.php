@props(['alumno','periodo','periodos','cursos','notas'])
<div class="w-full relative mt-4 shadow-2xl rounded my-24 overflow-hidden">
    <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
      
      <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
        <img src="{{Storage::url('images/qweasdzxcpoiñlkmnb542185.png')}}" class="h-24 w-24 object-cover rounded-full">
        <h1 class="text-2xl font-semibold">{{$alumno->persona->nombres}}
            {{$alumno->persona->apellidos}}</h1>
        <h4 class="text-sm font-semibold">{{$alumno->persona->email}}</h4>
      </div>
    </div>
    <div class="grid grid-cols-12 bg-white ">
  
      <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">
  
        @foreach ($periodos as $periodo)
            
        <a href="{{route('notas.listadoperiodo',array($alumno, $periodo))}}" class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold 
        hover:bg-indigo-700 hover:text-gray-200">{{$periodo->nombre}}</a>
  
        @endforeach
  
      </div>
  
      <div class="col-span-12 md:border-solid md:border-l 
      md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
          <div class="flex flex-col space-y-8">

            <div>
              <h3 class="text-2xl font-semibold">{{$periodo->nombre}}</h3>
              <hr>
            </div>

            <table class="min-w-full table-auto">
                <thead class="justify-between">
                  <tr class="bg-gray-800">
                    <th class="px-16 py-2">
                      <span class="text-gray-300">Curso</span>
                    </th>
                    <th class="px-16 py-2">
                      <span class="text-gray-300">Docente</span>
                    </th>
                    <th class="px-16 py-2">
                      <span class="text-gray-300">Nota</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-gray-200">
                  @foreach ($notas as $nota)
                      
                  <tr class="bg-white border-4 border-gray-200">
                    <td>
                      <span class="text-center ml-2 font-semibold">
                       {{ $nota->matricula->programacion->curso->nombre}}
                      </span>
                    </td>
                    <td>
                      <span class="text-center ml-2 font-semibold">
                        {{ $nota->matricula->programacion->docente->persona->nombres}}
                        {{ $nota->matricula->programacion->docente->persona->apellidos}}
                      </span>
                    </td>
                    <td class="px-16 py-2">
                      <span>{{ $nota->nota}}</span>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div> 

  {{-- <div>
    {{$notas->links()}}
  </div> --}}