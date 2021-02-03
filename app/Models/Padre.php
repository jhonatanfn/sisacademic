<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    use HasFactory;

    protected $fillable=['persona_id'];
    
    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function alumnos(){
        return $this->hasMany(Alumno::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }
}
