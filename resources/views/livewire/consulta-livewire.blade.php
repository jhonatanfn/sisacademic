<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Alumno
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Curso
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Docente
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Mensaje
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            
                @foreach ($consultas as $consulta)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  {{$consulta->matricula->alumno->persona->nombres}}
                                  {{$consulta->matricula->alumno->persona->apellidos}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  {{$consulta->matricula->programacion->curso->nombre}} 
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  {{$consulta->matricula->programacion->docente->persona->nombres}} 
                                  {{$consulta->matricula->programacion->docente->persona->apellidos}} 
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  {{$consulta->mensaje}} 
                                </td>       
                            </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-4">
            {{$consultas->links()}}
        </div>
      </div>
    </div>
  </div>
  
