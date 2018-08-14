<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Los usuarios pueden tener varias listas
    public function music_lists(){
      return $this->hasMany('App\MusicList');
    }
    //usuario pueden hacer varios likes y comentarios
    //El primer argumento que se pasa al método hasManyThrough es el nombre del modelo final al que deseamos acceder, mientras que el segundo argumento es el nombre del modelo intermedio
    public function likes(){
     return $this->hasMany('App\Like');
      //return $this->hasManyThrough('App\Like', 'App\Comment');
    }

    public function comments(){
       return $this->hasMany('App\Comment');
    }
}
