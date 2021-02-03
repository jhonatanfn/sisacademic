<x-app-layout>
    
    <x-nav-comunicado :categorias="$categorias"/>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">
            Categoria: {{$categoria->nombre}}</h1>
        @foreach ($comunicados as $comunicado)
            <x-card-comunicado :comunicado="$comunicado"/>
        @endforeach
        <div class="mt-4">
            {{$comunicados->links()}}
        </div>
    </div>
</x-app-layout>