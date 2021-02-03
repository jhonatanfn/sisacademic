<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $fillable=['mensaje','matricula_id','user_id'];
    
    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function matricula(){
        return $this->belongsTo(Matricula::class);
    }
}
