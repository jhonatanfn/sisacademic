<x-app-layout>
    <x-nav-reunion></x-nav-reunion>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$reunion->titulo}}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {{$reunion->objetivo}}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
             {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($reunion->image)
                    <img class="w-full h-80 object-cover object-center" 
                    src="{{Storage::url($reunion->image->url)}}" alt="">
                    @else
                    <img class="w-full h-80 object-cover object-center" 
                    src="{{Storage::url('default/reunion.jpg')}}" alt="">
                    @endif
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {{$reunion->contenido}}
                </div>
  
            @livewire('comment-livewire',['reunion_id'=>$reunion->id,'band'=>3])

            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">
                    Más en {{$reunion->programacion->curso->nombre}}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('reuniones.show',$similar)}}">
                                
                                @if ($similar->image)
                                <img class="w-36 h-20 object-cover object-center" 
                                src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                <img class="w-36 h-20 object-cover object-center" 
                                src="{{Storage::url('default/reunion.jpg')}}" alt="">
                                @endif
                             
                                <span class="ml-2 text-gray-600">{{$similar->titulo}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>