<x-app-layout>
    <x-nav-nota></x-nav-nota>
    <div class="container py-8">
      <x-card-nota :alumno="$alumno" :periodo="$periodo" :periodos="$periodos" :cursos="$cursos" :notas="$notas"/>
    </div>
</x-app-layout>