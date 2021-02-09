<x-app-layout>

  <x-nav-comunicado :categorias="$categorias"/>
  <div class="container py-8">
        @livewire('comunicado-livewire')
  </div>
  
</x-app-layout>