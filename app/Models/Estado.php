<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable=['nombre','slug','color'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function comunicados(){
        return $this->hasMany(Comunicado::class);
    }

    /* public function actividads(){
        return $this->hasMany(Actividad::class);
    } */
}
