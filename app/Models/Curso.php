<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable=['nombre','slug'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function docentes(){
        return $this->belongsToMany(Docente::class);
    }

   /*  public function actividads(){
        return $this->hasMany(Actividad::class);
    }

    public function consultas(){
        return $this->hasMany(Consulta::class);
    } */

    public function programacions(){
        return $this->hasMany(Programacion::class);
    }
}
