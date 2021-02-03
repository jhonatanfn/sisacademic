<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','persona_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_image(){
        //colocar codigo para recuperar foto de la base de datos.
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc(){
       //aqui codigo para recuperar el rol del usuario.
        return "Administrador";
    }

    public function adminlte_profile_url(){
        return "profile/username";
    }

    public function comunicados(){
        return $this->hasMany(Comunicado::class);
    }

    /* public function actividads(){
        return $this->hasMany(Actividad::class);
    } */

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function reunions(){
        return $this->hasMany(Reunion::class);
    }

    public function temas(){
        return $this->hasMany(Tema::class);
    }

   /*  public function consultas(){
        return $this->hasMany(Consulta::class);
    } */
}
