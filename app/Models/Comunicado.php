<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    use HasFactory;
    
    protected $guarded=['id'];

    public function getRouteKeyName()
    {
        return "slug";
    }
    
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
    }
}
