<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable = [
    'musiclist_id', 'user_id',
  ];

  // aque usuario pertenecce el like
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function musicLists(){
    return $this->belongsTo('App\MusicList');
  }
}
