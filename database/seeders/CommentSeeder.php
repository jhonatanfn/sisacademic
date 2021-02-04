<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Comunicado;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Actividad;
use App\Models\Reunion;
use App\Models\Tema;

class CommentSeeder extends Seeder
{
    
    public function run()
    {
        $users= User::all();
        $comunicados= Comunicado::where('id','<=',5)->get();
        $reunions=Reunion::where('id','<=',5)->get();
        $temas= Tema::where('id','<=',5)->get();

        foreach($users as $user){
            foreach($comunicados as $comunicado){
                Comment::factory(1)->create([
                    'commentable_id'=>$comunicado->id,
                    'commentable_type'=>Comunicado::class,
                    'user_id'=>$user->id
                ]);
            }
            foreach($reunions as $reunion){
                Comment::factory(1)->create([
                    'commentable_id'=>$reunion->id,
                    'commentable_type'=>Reunion::class,
                    'user_id'=>$user->id
                ]);
            }
            foreach($temas as $tema){
                Comment::factory(1)->create([
                    'commentable_id'=>$tema->id,
                    'commentable_type'=>Tema::class,
                    'user_id'=>$user->id
                ]);
            }
        }
    }
}
