<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class Section extends Component
{
    public function render()
    {
        $categorias= Categoria::all();

        return view('livewire.section',compact('categorias'));
    }
}
