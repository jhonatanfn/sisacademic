<div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6">
    @auth
    <div class="mb-3">
        <label for="mensaje" 
        class="block uppercase 
        text-gray-700 text-sm font-bold mb-2">Comentario</label>

        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
        id="mensaje" 
        wire:model="mensaje" 
        rows="5"
        placeholder="Ingrese su comentario">
        </textarea>

        @error('mensaje')
         <p class="text-sm text-red-500 font-bold">{{$message}}</p>
        @enderror
    </div>
    <button  wire:click="publicar" 
    class="bg-blue-500  mb-2 hover:bg-blue-700
     text-white font-bold px-4 py-2 rounded">Publicar</button>
    @endauth
   
    <div>
    <h1 class="text-2xl font-bold">Comentarios:</h1>
        @foreach ($comentarios as $comentario)

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">  
                             @if ($comentario->user->profile_photo_path==null)
                             <img class="h-10 w-10 rounded-full" 
                             src="{{ Storage::url('default/user.png') }}" alt="">    
                             @else
                             <img class="h-10 w-10 rounded-full" 
                             src="{{ $comentario->user->profile_photo_url }}" alt=""> 
                             @endif        
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{$comentario->user->persona->nombres}}  
                                {{$comentario->user->persona->apellidos}}
                              </div>
                              <div class="text-sm text-gray-500">
                                {{$comentario->mensaje}}
                              </div>
                              <div class="text-sm text-gray-900">
                                Creado: {{$comentario->created_at}}
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{$comentarios->links()}}
    </div>
</div>

