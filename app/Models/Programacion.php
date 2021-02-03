<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }

    public function reunions(){
        return $this->hasMany(Reunion::class);
    }

    public function temas(){
        return $this->hasMany(Tema::class);
    }
    public function asistenciads(){
        return $this->hasMany(Asistenciad::class);
    }
}
