@extends('layouts.app')
@section('content')


        <div class="card ">
            <div class="card-header">
                 <h1 class="lead text-center">Blog posts feed </h1>
                 <span>
                 <form action="{{route('blog.category')}}" method="get">
                <label for="category">Select a category</label>
                <select name="category" id="category">
                    <option value="all">All posts</option>

               @if (count($cat)> 0)
                   @foreach ($cat as $item)
                <option value="{{$item->category}}">{{$item->category}}</option>
                   @endforeach
                   @endif
                </select>
                <input type="submit" value="Go" class="btn btn-sm btn-info">
                </form>
                 </span>
            </div>
          @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="card-body">
<div class="row">

              <div class="col-md-4 col-lg-4">

        <img style="width:100%; height:280px" src="/storage/images/{{$post->image}}" alt="">
            </div>
            <div class="col-md-8 col-lg-8 card-text ">

            <h1 class="lead mt-2">{{$post->title}}</h1>
            <p > {{substr($post->body, 0, 300)}} <a href="/posts/{{$post->id}}">... see more</a></p >
            <i>Time: {{$post->created_at->diffForHumans()}}</i>
                  <p>Posted by <b>{{$post->author}}</b></p>
            </div>

        </div>
        </div>
        <div class="card-footer text-center">
        <a  class="mr-4" href="/like/{{$post->id}}">            <i class="fa fa-thumbs-up"> {{$post->like->count()}}</i>
        </a>
        <a class="mr-4" href="/unlike/{{$post->id}}">            <i class="fa fa-thumbs-down"> {{$post->unlike->count()}}</i>
        </a>
    <a class="mr-4" href="/posts/{{$post->id}}"> <i class="fa fa-comments-o"> {{$post->comment->count()}}</i></a>
         </div>

            @endforeach
</div>


        {{$posts->links()}}
        @else
        <h2>{{'No Posts Found'}}</h2>
        @if (!auth::guest())
              <a href="/posts/create" class="btn btn-primary">Create a Post</a>
        @endif

        <br>
    @endif
@endsection
