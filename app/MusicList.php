<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicList extends Model
{
  protected $fillable = [
      'name', 'photo', 'user_id'
  ];

  //la listas a que le pertenece al usuario
  public function user(){
    return $this->belongsTo('App\User');
  }

 //Una lista tiene muchos likes , se pone 'musiclist_id' como foranea ya que por defecto eloquent toma music_list_id y no existe
  public function likes(){
    return $this->hasMany('App\Like', 'musiclist_id');
  }
  //Una lista tiene muchos comentarios,se pone 'musiclist_id' como foranea ya que por defecto eloquent toma music_list_id y no existe
  public function comments(){
    return $this->hasMany('App\Comment', 'musiclist_id');
  }

  public function songs(){
    return $this->hasMany('App\Song', 'musiclist_id');
  }
}
