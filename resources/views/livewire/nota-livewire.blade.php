<div class="container py-8">
  <table class="min-w-full table-auto">
    <thead class="justify-between">
      <tr class="bg-gray-800">
        <th class="px-16 py-2">
          <span class="text-gray-300"></span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300">DNI</span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300">Nombres</span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300">Apellidos</span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300"></span>
        </th>
      </tr>
    </thead>
    <tbody class="bg-gray-200">
      @foreach ($alumnos as $alumno)
          
      <tr class="bg-white border-4 border-gray-200">
        <td class="px-16 py-2 flex flex-row items-center">
          <img
            class="h-8 w-8 rounded-full object-cover "
            src="{{Storage::url('images/qweasdzxcpoiñlkmnb542185.png')}}"
            alt=""
          />
        </td>
        <td>
          <span class="text-center ml-2 font-semibold">
           {{ $alumno->persona->dni}}
          </span>
        </td>
        <td>
          <span class="text-center ml-2 font-semibold">
           {{ $alumno->persona->nombres}}
          </span>
        </td>
        
        <td class="px-16 py-2">
          <span>{{ $alumno->persona->apellidos}}</span>
        </td>
        
        <td class="px-16 py-2">
          <a href="{{route('notas.listado',$alumno)}}" 
          class="bg-indigo-500 text-white px-4 py-2 
          border rounded-md hover:bg-white hover:border-indigo-500
           hover:text-black ">Notas</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    {{$alumnos->links()}}
  </div>
</div>







  
