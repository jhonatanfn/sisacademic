<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $fillable=['nombre','slug','inicio','fin','status'];

    public function getRouteKeyName()
    {
        return "slug";
    }
    
    public function programacions(){
        return $this->hasMany(Programacion::class);
    }
}
