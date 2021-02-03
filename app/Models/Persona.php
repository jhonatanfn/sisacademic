<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    
    protected $fillable=['dni','nombres','apellidos','direccion','telefono','email'];

    public function padre(){
        return $this->hasOne(Padre::class);
    }

    public function docente(){
        return $this->hasOne(Docente::class);
    }

    public function alumno(){
        return $this->hasOne(Alumno::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
