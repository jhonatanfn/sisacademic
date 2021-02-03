<x-app-layout>
  <x-nav-nota></x-nav-nota>
  <div class="container py-8">
    @livewire('notadetalle-livewire', ['alumno' => $alumno]) 
  </div>
</x-app-layout>
