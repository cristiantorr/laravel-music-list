<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
      'musiclist_id', 'user_id', 'description'
  ];

  public function musicLists(){
    return $this->belongsTo('App\MusicList');
  }
}
