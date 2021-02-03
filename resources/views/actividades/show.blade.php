<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$actividad->titulo}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{$actividad->extracto}}
        </div>
       
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
             {{-- contenido principal --}}
            <div class="lg:col-span-2">
                
                <figure>
                    <img class="w-full h-80 object-cover object-center" 
                    src="{{Storage::url($actividad->image->url)}}" alt="">
                </figure>

                
                {{-- Panel de comentarios --}}
                <div class="text-base text-gray-500 mt-4">
                    {{$actividad->cuerpo}}
                </div>

                @livewire('comment-livewire',['actividad_id'=>$actividad->id,'band'=>2])

            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">
                    Más en {{$actividad->categoria->nombre}}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('actividades.show',$similar)}}">
                                <img class="w-36 h-20 object-cover object-center" 
                                src="{{Storage::url($similar->image->url)}}" alt="">
                                <span class="ml-2 text-gray-600">{{$similar->titulo}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>