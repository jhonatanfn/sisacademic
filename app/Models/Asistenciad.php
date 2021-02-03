<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistenciad extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function programacion(){
        return $this->belongsTo(Programacion::class);
    }
}
