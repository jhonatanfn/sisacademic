<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    
    public function getRouteKeyName()
    {
        return "slug";
    }
    
    public function programacion(){
        return $this->belongsTo(Programacion::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
