<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use Livewire\Component;
use App\Models\Comment;
use App\Models\Comunicado;
use Livewire\WithPagination;
use App\Models\Reunion;
use App\Models\Tema;

class CommentLivewire extends Component
{
    use WithPagination;
    public $actividad_id,$mensaje,$band,$comunicado_id,$reunion_id,$tema_id;

    protected $messages=[
        'mensaje.required'=>'El campo comentario es obligatorio.'
    ];

    public function render()
    {
        if($this->band==1){
            $comunicado=Comunicado::find($this->comunicado_id);
            $comentarios=$comunicado->comments()->latest('id')->paginate(10);
        }else{
            if($this->band==2){
                $actividad= Actividad::find($this->actividad_id);
                $comentarios=$actividad->comments()->latest('id')->paginate(10);
            }else{
                if($this->band==3){
                    $reunion= Reunion::find($this->reunion_id);
                    $comentarios=$reunion->comments()->latest('id')->paginate(10);
                }else{
                    $tema= Tema::find($this->tema_id);
                    $comentarios=$tema->comments()->latest('id')->paginate(10);
                }
          
            }
        }
        return view('livewire.comment-livewire',compact('comentarios'));
    }

    public function publicar(){

        $this->validate([
            'mensaje'=>'required',
        ]);

        if($this->band==1){
            Comment::create([
                'mensaje'=>$this->mensaje,
                'commentable_id'=>$this->comunicado_id,
                'commentable_type'=>Comunicado::class,
                'user_id'=>auth()->user()->id,
            ]);
        }else{

            if($this->band==2){
                Comment::create([
                    'mensaje'=>$this->mensaje,
                    'commentable_id'=>$this->actividad_id,
                    'commentable_type'=>Actividad::class,
                    'user_id'=>auth()->user()->id,
                ]);
            }else{
                if($this->band==3){
                    Comment::create([
                        'mensaje'=>$this->mensaje,
                        'commentable_id'=>$this->reunion_id,
                        'commentable_type'=>Reunion::class,
                        'user_id'=>auth()->user()->id,
                    ]);
                }else{
                    Comment::create([
                        'mensaje'=>$this->mensaje,
                        'commentable_id'=>$this->tema_id,
                        'commentable_type'=>Tema::class,
                        'user_id'=>auth()->user()->id,
                    ]);
                }
            }
        }
        $this->reset(['mensaje']);
    }
}