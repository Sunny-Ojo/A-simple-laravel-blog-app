<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\post;
use App\Unlike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => ['category']]);
    }
    //
    public function like($post)
    {
        $check = Like::where('user_id', Auth::id())->where('post_id', $post)->first();

        $unLike = Unlike::where('user_id', Auth::id())->where('post_id', $post)->first();
        if ($check) {
            $check->delete();
            return redirect()->back();
        } elseif ($unLike) {
            $unLike->delete();
            $like = new Like();
            $like->post_id = $post;
            $like->user_id = Auth::id();
            $like->save();
            return redirect()->back();
        } else {
            $like = new Like();
            $like->post_id = $post;
            $like->user_id = Auth::id();
            $like->save();
            return redirect()->back();
        }

    }
    public function unlike($post)
    {
        $unLike = Unlike::where('user_id', Auth::id())->where('post_id', $post)->first();
        $check = Like::where('user_id', Auth::id())->where('post_id', $post)->first();
        if ($unLike) {
            $unLike->delete();
            return redirect()->back();
        } elseif ($check) {
            $check->delete();
            $unlike = new Unlike();
            $unlike->post_id = $post;
            $unlike->user_id = Auth::id();
            $unlike->save();
            return redirect()->back();
        } else {
            $unlike = new Unlike();
            $unlike->post_id = $post;
            $unlike->user_id = Auth::id();
            $unlike->save();
            return redirect()->back();
        }
    }

    public function comments($post)
    {
        $replies = Comment::where('post_id', $post);
        $post = post::find($post);
        return view('posts.reply')->with(['post' => $post, 'replies' => $replies]);
    }
    public function storeReply(Request $request, $post)
    {
        $this->validate($request, [
            'reply' => 'required|string',
        ]);
        $reply = new Comment();
        $reply->reply = $request->reply;
        $reply->user_id = Auth::id();
        $reply->post_id = $post;
        $reply->save();
        return redirect()->back()->with('success', 'you replied to this post');
    }
    public function deleteComment($post)
    {
        $editreply = Comment::find($post);
        $editreply->delete();
        return redirect()->back()->with('success', 'comment was deleted successfully');

    }

    public function category(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);
        if ($request->category == 'all') {
            return redirect()->route('posts.index');
        }
        $post = post::where('category', $request->category)->paginate(10);
        $cat = post::orderBy('created_at', 'desc')->paginate(10);

        return view('posts.category')->with(['posts' => $post, 'cat' => $cat]);
    }
}