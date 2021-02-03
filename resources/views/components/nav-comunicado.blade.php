@props(['categorias'])
<nav class="bg-white px-6 py-4 shadow">
    <div class="flex flex-col container mx-auto md:flex-row md:items-center md:justify-between">
        <div class="flex justify-between items-center">
            <div>
                <a href="#" class="text-gray-800 text-xl font-bold md:text-2xl">Comunicados</a>
            </div>
           {{--  <div>
                <button x-on:click="open=true" type="button" class="block text-gray-800
                 hover:text-gray-600 focus:text-gray-600 
                 focus:outline-none md:hidden">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div> --}}
        </div>
        {{-- md:flex flex-col  md:flex-row md:-mx-4 hidden --}}
        <div class="md:flex flex-col  md:flex-row md:-mx-4">
          @foreach ($categorias as $categoria) 
            <a href="{{route('comunicados.categoria',$categoria)}}" class="my-1 
            text-gray-800 
            hover:text-blue-500 md:mx-4 md:my-0">{{$categoria->nombre}}</a>
          @endforeach
           {{--  <a href="#" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Blog</a>
            <a href="#" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">About us</a> --}}
        </div>
    </div>
</nav>