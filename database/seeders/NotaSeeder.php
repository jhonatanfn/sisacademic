<?php

namespace Database\Seeders;

use App\Models\Matricula;
use Illuminate\Database\Seeder;
use App\Models\Nota;
use App\Models\Programacion;
use App\Models\Situacion;

class NotaSeeder extends Seeder
{
    public function run()
    {

        $programacions= Programacion::all();
        
        foreach($programacions as $programacion){
            $matriculas= $programacion->matriculas()->get();
            foreach($matriculas as $matricula){
                $nota=rand(0,20);
                if($nota<=10){
                    $situacion=Situacion::find(4)->id;
                }else{
                if($nota<=14){
                    $situacion=Situacion::find(3)->id;
                }else{
                if($nota<=18){
                    $situacion=Situacion::find(2)->id;
                }else{
                    $situacion=Situacion::find(1)->id;
                    }
                }
                    Nota::create([
                        'matricula_id'=>$matricula->id,
                        'tipoevaluacion_id'=>rand(1,5),
                        'situacion_id'=>$situacion,
                        'nota'=>$nota
                    ]);
                }
            }
        }
    }
}
