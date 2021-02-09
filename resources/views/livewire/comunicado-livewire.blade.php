<div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-2">
        @foreach ($comunicados as $comunicado)
            <article class="w-full h-80 bg-cover bg-center  @if($loop->first) md:col-span-2 @endif" 
            style="background-image: url(
            @if($comunicado->image) 
                {{Storage::url($comunicado->image->url)}} 
            @else
                {{Storage::url('default/comunicado.jpg')}} 
            @endif)">
                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div>                                 
                    <a href="{{route('comunicados.categoria',$comunicado->categoria)}}" 
                        class="inline-block px-3 h-6 bg-{{$comunicado->categoria->color}}-600 
                        text-white rounded-full">{{$comunicado->categoria->nombre}}</a> 
                    <a href="#" 
                        class="inline-block px-3 h-6 bg-gray-600 
                     text-white rounded-full">{{$comunicado->user->name}}</a> 
                    
                    </div>

                    <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                        <a href="{{route('comunicados.show',$comunicado)}}">
                            {{$comunicado->titulo}}
                        </a>
                    </h1>
                </div>
            </article>
        @endforeach
</div>
<div class="mt-4">
    {{$comunicados->links()}}
</div>
</div>
