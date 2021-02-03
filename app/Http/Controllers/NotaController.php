<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Periodo;
use App\Models\Nota;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('notas.index');
    }

    public function detalle(Alumno $alumno){
        return view('notas.detalle',compact('alumno'));
    }

    public function listar(Request $request){
        dd($request);
    }

    public function consulta(Matricula $matricula){
        return view('notas.consulta',compact('matricula'));
    }

    public function listado(Alumno $alumno){
        $periodos= array();
        $cursos= array();
        $notas=array();
        
        $matriculas= $alumno->matriculas()->latest('id')->paginate(5);
        $matricula=$alumno->matriculas()->first();
        $periodo=$matricula->programacion->periodo;

        foreach($matriculas as $matricula){
            $periodoObject=$matricula->programacion->periodo;
            $cursoObject=$matricula->programacion->curso;
            
            if($this->search_array($periodoObject->id,$periodos)==false){
             array_push($periodos,$periodoObject);
            }
            
            if($this->search_array($cursoObject->id,$cursos)==false){
             array_push($cursos,$cursoObject);
            } 
            if($matricula->programacion->periodo->id==$periodo->id){
                foreach($matricula->notas()->get() as $item){                
                    array_push($notas,$item);
                }       
            }
         }
        
        return view('notas.listado',compact('alumno','periodo','periodos','cursos','notas'));
    }

    public function listadoperiodo(Alumno $alumno, Periodo $periodo){

        $periodos= array();
        $cursos= array();
        $notas=array();

        $matriculas= $alumno->matriculas()->latest('id')->paginate(5);

        foreach($matriculas as $matricula){
            $periodoObject=$matricula->programacion->periodo;
            $cursoObject=$matricula->programacion->curso;
            
            if($this->search_array($periodoObject->id,$periodos)==false){
             array_push($periodos,$periodoObject);
            }
            
            if($this->search_array($cursoObject->id,$cursos)==false){
             array_push($cursos,$cursoObject);
            } 
            if($matricula->programacion->periodo->id==$periodo->id){
                foreach($matricula->notas()->get() as $item){
                    array_push($notas,$item);
                }
            }
         }

        return view('notas.listadoperiodo',compact('alumno','periodo','periodos','cursos','notas'));
    }

    public function search_array($id,$array=array()){
        $clave=false;
        foreach($array as $item){
            if($item->id==$id){
               $clave= true;
            }else{
                $clave =false;
            }  
        }
        return $clave;
    }
}
