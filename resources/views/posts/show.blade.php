@extends('layouts.app')
@section('content')

   <a href="/posts" class="btn btn-primary">Go back</a>
            <div class="">

            <h1>Title: {{$posts->title}}</h1>
                        <img style="width:80%;height:100%" src="/storage/images/{{$posts->image}}" alt="cover image">

            <h3> {{$posts->body}}</h3>
            <i>Time: {{$posts->created_at->diffForHumans()}} by {{$posts->user->name}}</i><br>
       @if (!Auth::guest())
       @if (auth::user()->id == $posts->user_id)
                        <strong><a href="/posts/{{$posts->id}}/edit" class="btn btn-success float-left">Edit</a></strong>
        {!!Form::open(['action' => ['PostsController@destroy', $posts->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger',  'float-left'])}}
        {!!Form::close() !!}
       @endif

       @endif


            </div>


@endsection
