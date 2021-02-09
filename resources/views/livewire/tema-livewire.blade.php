<div>
    <section class="flex flex-row flex-wrap mx-auto">
        @foreach ($temas as $tema)    
        <div
          class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/2 lg:w-1/3">
          <div
            class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
            <div class="md:flex-shrink-0">
              @if ($tema->image)
                <img
                src="{{Storage::url($tema->image->url)}}"
                alt="Blog Cover"
                class="object-fill w-full rounded-lg rounded-b-none md:h-56"/>
              @else 
                <img
                  src="{{Storage::url('default/tema.jpg')}}"
                  alt="Blog Cover"
                  class="object-fill w-full rounded-lg rounded-b-none md:h-56"/>
              @endif
            </div>
            <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
              <span class="text-xs font-medium text-blue-600 uppercase">
                {{$tema->programacion->curso->nombre}}
              </span>
            </div>
            <hr class="border-gray-300" />
            <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
                  <a href="{{route('temas.show',$tema)}}" class="hover:underline">
                    <h2 class="text-2xl font-bold tracking-normal text-gray-800">
                      {{$tema->titulo}}
                    </h2>
                  </a>
            </div>
            <hr class="border-gray-300" />
            <p
              class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700"
            >
              {{$tema->proposito}}
            </p>
            <hr class="border-gray-300" />
            <section class="px-4 py-2 mt-2">
              <div class="flex items-center justify-between">
                <div class="flex items-center flex-1">
                  @if ($tema->user->profile_photo_path==null)
                    <img
                    class="object-cover h-10 rounded-full"
                    src="{{Storage::url('default/user.png')}}"
                    alt=""
                  />
                  @else 
                    <img
                    class="object-cover h-10 rounded-full"
                    src="{{$tema->user->profile_photo_path }}"
                    alt=""
                    />
                  @endif
                  
                  <div class="flex flex-col mx-2">
                      <a href="{{route('temas.usuario',$tema->user)}}" class="font-semibold text-gray-700 hover:underline">
                        {{$tema->user->persona->nombres}}
                        {{$tema->user->persona->apellidos}}
                      </a>
                    <span class="mx-1 text-xs text-gray-600">{{$tema->created_at}}</span>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        @endforeach
    </section>
    <div>
        {{$temas->links()}}
    </div>
</div>



