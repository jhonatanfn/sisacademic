<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable=['persona_id','padre_id'];
    
    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function padre(){
        return $this->belongsTo(Padre::class);
    }

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }
}
