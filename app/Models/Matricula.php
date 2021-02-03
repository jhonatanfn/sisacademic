<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    
    public function alumno(){
        return $this->belongsTo(Alumno::class);
    }

    public function notas(){
        return $this->hasMany(Nota::class);
    }

    public function programacion(){
        return $this->belongsTo(Programacion::class);
    }

    public function asistenciaes(){
        return $this->hasMany(Asistenciae::class);
    } 

}
