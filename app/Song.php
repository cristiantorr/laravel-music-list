<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
  protected $fillable = [
      'name', 'artist', 'youtube_url', 'musiclist_id'
  ];

  public function musicLists(){
    return $this->belongsToMany('App\MusicList');
  }
}
