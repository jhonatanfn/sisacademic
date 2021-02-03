<x-app-layout>
    
    <x-nav-tema></x-nav-tema>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">
            Usuario: {{$user->persona->nombres}} {{$user->persona->apellidos}}</h1>
        @foreach ($temas as $tema)
            <x-card-tema :tema="$tema"/>
        @endforeach
        <div class="mt-4">
            {{$temas->links()}}
        </div>
    </div>
</x-app-layout>