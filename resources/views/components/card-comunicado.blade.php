@props(['comunicado'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" 
    src="{{Storage::url($comunicado->image->url)}}" alt="">
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('comunicados.show',$comunicado)}}">{{$comunicado->titulo}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {{$comunicado->extracto}}
        </div>
    </div>
</article>