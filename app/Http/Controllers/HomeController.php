<?php

namespace App\Http\Controllers;
use App\Musiclist;
use App\Like;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application views users
     * $lists_top = Display five music list with more likes
     * $lists_random = Display five music list random
     * $lists_recommended =  Display music list for more comments
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lists_top = Musiclist::withCount('likes')
                   ->orderBy('likes_count', 'desc')
                   ->take(5)
                   ->get();
      $lists_random = Musiclist::all()->random(5);

      $lists_recommended = Musiclist::withCount('comments')
                           ->orderBy('comments_count', 'desc')
                           ->take(5)
                           ->get();

       return view('/home', compact('lists_top', 'lists_random', 'lists_recommended'));

    }
}
