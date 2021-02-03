<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function reunion(){
        return $this->belongsTo(Reunion::class);
    }

    public function padre(){
        return $this->belongsTo(Padre::class);
    }
}
