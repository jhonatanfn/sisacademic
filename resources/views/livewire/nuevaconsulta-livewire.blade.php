    <div class="bg-gray-100 overflow-x-hidden">
        <div class="px-6 py-8">
            <div class="flex justify-between container mx-auto">
                <div class="w-full lg:w-8/12">
                    
                    
                    @if (session()->has('info'))
                        <div class="bg-teal-100 border-t-4
                        border-teal-500 rounded-b 
                        text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                            <p class="text-sm">{{ session('info') }}</p>
                            </div>
                        </div>
                        </div>
                    @endif
                    
                    
                    <div class="mt-6">
                        <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <span class="font-light text-gray-600"> Docente: 
                                    {{$matricula->programacion->docente->persona->nombres}}
                                    {{$matricula->programacion->docente->persona->apellidos}}
                                </span>
                                <a href="#"
                                class="px-2 py-1 bg-gray-600 
                                text-gray-100 font-bold rounded 
                                hover:bg-gray-500">{{$matricula->programacion->curso->nombre}}</a>
                            </div>
                            <div class="mt-2">
                                <h1 class="text-2xl text-gray-700 font-bold hover:underline">
                                    Alumno: {{$matricula->alumno->persona->nombres}}
                                    {{$matricula->alumno->persona->apellidos}}
                                </h1>
                        
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 
                                text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                id="mensaje" 
                                wire:model="mensaje" 
                                rows="5"
                                placeholder="Ingrese su mensaje">
                                </textarea>

                                @error('mensaje')
                                    <p class="text-sm text-red-500 font-bold">{{$message}}</p>
                                 @enderror

                            </div>
                            <div class="flex justify-between items-center mt-4">
                                    <button wire:click="enviar" 
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Enviar
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   {{--  <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Escriba su Consulta</h3>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">

        @if (session()->has('info'))
                <div class="bg-teal-100 border-t-4
                 border-teal-500 rounded-b 
                 text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('info') }}</p>
                    </div>
                  </div>
                </div>
        @endif

          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                
                <div class="col-span-12 sm:col-span-6">                
                  <label for="name" class="block uppercase 
                  text-gray-700 text-sm font-bold mb-2">Docente</label>
                </div>

                <div class="col-span-12 sm:col-span-6">                
                  <label for="name" class="block uppercase 
                  text-gray-700 text-sm font-bold mb-2">Curso</label>
                </div>

                <div class="col-span-12 sm:col-span-6">      
                  <label for="mensaje" 
                  class="block uppercase 
                  text-gray-700 text-sm font-bold mb-2">Mensaje</label>
          
                  <textarea class="shadow appearance-none border rounded w-full py-2 px-3 
                  text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                  id="mensaje" 
                  wire:model="mensaje" 
                  rows="5"
                  placeholder="Ingrese su mensaje">
                  </textarea>
                  @error('mensaje')
                    <p class="text-sm text-red-500 font-bold">{{$message}}</p>
                  @enderror
                </div>
              </div>

            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button wire:click="enviar" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enviar
              </button>
            </div>
          </div>
      </div>
    </div> --}}

 