<?php

namespace App\Http\Controllers;

use App\post;
use App\User;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cat = post::orderBy('created_at', 'desc')->paginate(10);
        $posts = post::orderBy('created_at', 'desc')->paginate(10);
        return view('/posts.index')->with(['posts' => $posts, 'cat' => $cat]);
    }
    public function home()
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('posts', $user->posts);
    }
}