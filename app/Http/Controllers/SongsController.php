<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musiclist;
use App\Song;


class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      $listSongs = Musiclist::with('songs')
                         ->where('id', $id)
                         ->first();

      return view('songs/homesongs', compact('listSongs','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $musiList_id = $id;
      return view('songs/createsong', compact('musiList_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      try {
        $storeSongID = $id;
        $storeSong = new Song;
        $storeSong->name         = $request->name;
        $storeSong->artist       = $request->artist;
        $storeSong->youtube_url  = $request->youtube;
        $storeSong->musiclist_id = $storeSongID;
        $storeSong->save();
        return redirect()->route('songs.home',[$storeSongID])->with('message', 'Se ha creado la canción');
      } catch (\Exception $e) {
        dd('no entro'.$e);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      try {
        //dd($id);
        $editSong = Song::find($id);
        return view('songs/updatesongs', compact('editSong'));

      } catch (\Exception $e) {
          dd('no entro'.$e);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
          $updateSong               = Song::findOrFail($request->id);
          $updateSong->name         = $request->name;
          $updateSong->artist       = $request->artist;
          $updateSong->youtube_url  = $request->youtube;
          $updateSong->save();
          return redirect()->route('songs.showedit',[$request->id])->with('message', 'Se ha editado la canción');

        } catch (\Exception $e) {
          dd('no entro'.$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $songsDelete = Song::findOrFail($id)->delete();
        return redirect()->route('musiclist.home')->with('message', 'Se ha eliminado la canción');
      } catch (\Exception $e) {
        dd('No entro'.$e);
      }
    }
}
