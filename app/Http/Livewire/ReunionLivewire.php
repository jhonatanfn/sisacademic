<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Reunion;

class ReunionLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $reuniones= Reunion::where('id','>=',1)->latest('id')->paginate(5);
        return view('livewire.reunion-livewire',compact('reuniones'));
    }
}
