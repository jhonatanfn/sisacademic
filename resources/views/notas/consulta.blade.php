<x-app-layout>
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-4 px-2 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900">
          Nueva Consulta
        </h1>
      </div>
    </header>
    <div class="container py-8">
        @livewire('nuevaconsulta-livewire', ['matricula' => $matricula])
    </div>
  </x-app-layout>