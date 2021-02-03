<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable=['titulo','slug','extracto','enlace','cuerpo','status','categoria_id','user_id','curso_id','estado_id'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
    }
}
