<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">
            Curso: {{$curso->nombre}}</h1>
        @foreach ($actividades as $actividad)
            <x-card-actividad :actividad="$actividad"/>
        @endforeach

        <div class="mt-4">
            {{$actividades->links()}}
        </div>
        
    </div>
</x-app-layout>