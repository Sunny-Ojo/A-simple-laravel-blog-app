@extends('layouts.app')
@section('content')
    <h1 class=" text-center text-monospace card-header">Blog Posts</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="card card-body">
<div class="row">
              <div class="col-md-4 col-lg-4">
<img style="width:100%;" src="/storage/images/{{$post->image}}" alt="">
            </div>
            <div class="col-md-8 col-lg-8">

            <h3><b>{{$post->title}}</b></h3>
            <h4> {{substr($post->body, 0, 20)}} <a href="/posts/{{$post->id}}">...see more</a></h4>
            <i>Time: {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</i>
            </div>

        </div>
        </div>
        @endforeach
        {{$posts->links()}}
        @else
        <h2>{{'No Posts Found'}}</h2>
        <a href="/posts/create" class="btn btn-primary">Create a Post</a>
        <br>
    @endif
@endsection
