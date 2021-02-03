<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    public function matricula(){
        return $this->belongsTo(Matricula::class);
    }

    public function tipoevaluacion(){
        return $this->belongsTo(Tipoevaluacion::class);
    }

    public function situacion(){
        return $this->belongsTo(Situacion::class);
    }
}
