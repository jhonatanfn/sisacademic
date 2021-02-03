<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $fillable=['persona_id'];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function cursos(){
        return $this->belongsToMany(Curso::class);
    }

    /* public function consultas(){
        return $this->hasMany(Consulta::class);
    } */

    public function programacions(){
        return $this->hasMany(Programacion::class);
    }
}
