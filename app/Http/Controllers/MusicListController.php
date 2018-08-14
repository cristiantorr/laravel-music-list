<?php

namespace App\Http\Controllers;
use App\User;
use App\Musiclist;
use App\Like;
use App\Comment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\http\Requests\StoreMusicListRequest;
use App\http\Requests\UpdateMusicListRequest;
use Illuminate\Support\Facades\Storage;

class MusicListController extends Controller
{
    /**
     *show aplications home listas  creater music
     * reference:https://laravel.com/docs/5.3/eloquent-relationships#has-many-through
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $show_lists = Musiclist::with('user')
                    ->withCount('likes','comments', 'songs')
                    ->orderBy('likes_count', 'desc')
                    ->paginate(15);
      return view('musiclist/homelist', compact('show_lists'));
    }

    public function like($id){
      try {
        $likeMusicListId = $id;
        $likeUserId = Auth::id();
        $likeUserVerify = Like::where('musiclist_id', '=' , $likeMusicListId)
                     ->where('user_id', '=' , $likeUserId)
                     ->get();

        if ( $likeUserVerify->count() ) {
          return redirect()->route('musiclist.home')->with('alert', 'Ya le has dado like ala lista');
        }else{
          $like = new Like;
          $like->musiclist_id = $likeMusicListId;
          $like->user_id = $likeUserId;
          $like->save();
          return redirect()->route('musiclist.home')->with('message', 'Gracias por darle me gusta al la lista');
        }
      } catch (\Exception $e) {
        dd('no entro'.$e);
      }
    }

    /**
     * Show the form for creating a new listas.
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      return view('musiclist/createlist');
    }

    /**
     * Show the form for creating a new comments.
     * @return \Illuminate\Http\Response
     */
    public function musiclistComments()
    {
      return view('musiclist/commentlist');
    }

    /**
     * Store a newly created resource in storage.
     * $picture = obtenemos la imagen como objeto file()
     * $storage_picture = hacemos  symbolic link y lo movemos al public
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMusicListRequest $request)
    {
      try {
        $userLogin              = Auth::user();
        $picture                = $request->file('picture');
        $storage_picture        = Storage::put('public/musiclist', $picture);
        $registerMusic          = new Musiclist;
        $registerMusic->name    = $request->name;
        $registerMusic->photo   = $picture->hashName();
        $registerMusic->user_id = $userLogin->id;
        $registerMusic->save();
        return redirect()->route('musiclist.showcreate')->with('message', 'Se ha registrado la lista '.$request->name);
      } catch (\Exception $e) {
        dd('no entro');
        return view('musiclist/createlist')->with('error', 'No se registro la lista'.$e);
      }
    }

    /**
     * Display the music list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $musiclistUpdate = Musiclist::find($id);
        // dd($musiclistUpdate);
        return view('musiclist/updatelist', compact('musiclistUpdate'));

      } catch (\Exception $e) {
          dd($e);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMusicListRequest $request)
    {

        try {
          //dd($request->id);
          $updateLogin          = Auth::user();
          $updateMusic          = Musiclist::findOrFail($request->id);
          $updateMusic->name    = $request->name;
          if ($request->hasFile('picture')) {
            $picture            = $request->file('picture');
            $storage_picture    = Storage::put('public/musiclist', $picture);
            $updateMusic->photo = $picture->hashName();
          }
          $updateMusic->user_id = $updateLogin->id;
          $updateMusic->save();
            return redirect()->route('musiclist.showedit',[$request->id])->with('message', 'Se ha actualizado la lista');
          } catch (\Exception $e) {
          dd($e);
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
        $musiclistDelete = Musiclist::findOrFail($id)->delete();
        return redirect()->route('musiclist.home')->with('message', 'Se ha eliminado la lista');
      } catch (\Exception $e) {
        dd($e);
      }
    }
}
