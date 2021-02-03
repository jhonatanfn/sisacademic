<x-app-layout>
    
    <x-nav-reunion></x-nav-reunion>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">
            Usuario: {{$user->persona->nombres}} {{$user->persona->apellidos}}</h1>
        @foreach ($reuniones as $reunion)
            <x-card-reunion :reunion="$reunion"/>
        @endforeach
        <div class="mt-4">
            {{$reuniones->links()}}
        </div>
    </div>
</x-app-layout>