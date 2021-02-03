@props(['actividad'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" 
    src="{{Storage::url($actividad->image->url)}}" alt="">
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('actividades.show',$actividad)}}">{{$actividad->titulo}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {{$actividad->extracto}}
        </div>
    </div>
</article>