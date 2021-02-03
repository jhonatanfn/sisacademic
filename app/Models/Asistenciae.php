<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistenciae extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function matricula(){
        return $this->belongsTo(Matricula::class);
    }
}
