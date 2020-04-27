<?php

namespace App\Http\Controllers;

use App\Category;
use App\post;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = post::orderBy('created_at', 'desc')->paginate(10);
        $posts = post::orderBy('created_at', 'desc')->paginate(10);
        return view('/posts.index')->with(['posts' => $posts, 'cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('/posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image' => 'image | nullable |',

        ]);
        if ($request->hasFile('image')) {
            $imagefullname = $request->file('image')->getClientOriginalName();
            $imageExtention = $request->file('image')->getClientOriginalExtension();
            $imagename = pathinfo('image', PATHINFO_FILENAME);
            $imagetostore = $imagename . '_' . time() . '.' . $imageExtention;
            $path = $request->file('image')->storeAs('public/images', $imagetostore);

        } else {
            $imagetostore = 'noimage.jpg';
        }
        $post = new post;
        $post->title = $request->title;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->slug = $request->title;
        $post->image = $imagetostore;
        $post->user_id = auth()->user()->id;
        $post->author = auth()->user()->name;
        $post->save();
        return redirect('/posts')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $replies = DB::select('select * from comments where post_id = ?', [$id]);
        $posts = post::find($id);
        return view('/posts.show')->with(['post' => $posts, 'reply' => $replies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        if (Auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error', 'Access denied');
        } else {
            return view('/posts.edit')->with('post', $post);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'image' => 'image | nullable',

        ]);
        if ($request->hasFile('image')) {
            $imagefullname = $request->file('image')->getClientOriginalName();
            $imageExtention = $request->file('image')->getClientOriginalExtension();
            $imagename = pathinfo('image', PATHINFO_FILENAME);
            $imagetostore = $imagename . '_' . time() . '.' . $imageExtention;
            $path = $request->file('image')->storeAs('public/images', $imagetostore);

        } else {
            $imagetostore = 'noimage.jpg';
        }
        $post = post::find($id);
        $post->title = $request->title;
        $post->category = $request->category;

        $post->body = $request->body;
        if ($request->hasFile('image')) {
            $post->image = $imagetostore;

        }
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.show', [$id])->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        if (Auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error', 'Access denied');
        }

        Storage::delete('public/images/' . $post->image);
        $post->delete();
        return redirect('/posts')->with('success', 'Post has been deleted successfully');
    }
}