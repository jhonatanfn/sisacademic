@props(['tema'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($tema->image)
    <img class="w-full h-72 object-cover object-center" 
    src="{{Storage::url($tema->image->url)}}" alt="">
    @else
    <img class="w-full h-72 object-cover object-center" 
    src="{{Storage::url('default/tema.jpg')}}" alt="">
    @endif
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('temas.show',$tema)}}">{{$tema->titulo}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {{$tema->proposito}}
        </div>
    </div>
</article>