<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-2">
        @foreach ($actividades as $actividad)
            <article class="w-full h-80 bg-cover bg-center  @if($loop->first) md:col-span-2 @endif" 
            style="background-image: url({{Storage::url($actividad->image->url)}})">
                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div>                          
                    <a href="{{route('actividades.estado',$actividad->estado)}}" 
                    class="inline-block px-3 h-6 bg-{{$actividad->estado->color}}-600 
                    text-white rounded-full">{{$actividad->estado->nombre}}</a>          
                    
                    <a href="{{route('actividades.categoria',$actividad->categoria)}}" 
                        class="inline-block px-3 h-6 bg-{{$actividad->categoria->color}}-600 
                        text-white rounded-full">{{$actividad->categoria->nombre}}</a> 

                    <a href="{{route('actividades.curso',$actividad->curso)}}" 
                        class="inline-block px-3 h-6 bg-yellow-600 
                        text-white rounded-full">{{$actividad->curso->nombre}}</a> 

                    </div>

                    <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                        <a href="{{route('actividades.show',$actividad)}}">
                            {{$actividad->titulo}}
                        </a>
                    </h1>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-4">
        {{$actividades->links()}}
    </div>
</div>
