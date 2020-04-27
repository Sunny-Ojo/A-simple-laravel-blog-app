@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-xs-12 col-md-8">
            <div class="card">

                <div class="card-header text-success float-left"><h4 class="text-center text-dark text-bold"> {{$post->title}}</h4>
                    <i>Time: {{$post->created_at->diffForHumans()}} </i><br>
                       <p>Posted by <b class="text-dark">{{$post->author}}</b></p>
                @if (!Auth::guest())
            @if (auth::user()->id == $post->user_id)
                             <strong><a href="/posts/{{$post->id}}/edit" class="mr-2 btn btn-primary float-left">Edit</a></strong>
             {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-left']) !!}
             {{Form::hidden('_method', 'DELETE')}}
             {{Form::submit('Delete', ['class' => 'btn btn-danger',  ''])}}
             {!!Form::close() !!}

      @endif
            @endif </div>

           <div class="card-img-top  text-center mt-4">
          <img style="width:80%;height:80%" src="/storage/images/{{$post->image}}" alt="cover image">

           </div>
           <div class="card-body"><p>   {{$post->body}}    </p></div>
          <div class="card-footer text-center">
  <a  class="mr-4" href="/like/{{$post->id}}">            <i class="fa fa-thumbs-up"> {{$post->like->count()}}</i>
                 </a>
                 <a class="mr-4" href="/unlike/{{$post->id}}">            <i class="fa fa-thumbs-down"> {{$post->unlike->count()}}</i>
                 </a>
             <span class="mr-4" href="/posts/{{$post->id}}/comment"> <i class="fa fa-comments-o"> {{$post->comment->count()}} Comments</i></span>


               </div>


          <div class="">
              @if (count($reply ) > 0)
              <h1 class="lead bg-dark text-center text-white p-3">Replies for this post</h1>
                  @foreach ($reply as $replies)
                <div class="list-group-item">
                    {{ $replies->reply }}
                    @if ($replies->user_id != Auth::id())
                    @else
                    <a class="float-right text-danger" href="/remove/comment/{{$replies->id}}"> Delete comment</a>
                @endif

                </div>
                  @endforeach
                  @else
                 <h1 class="lead text-center text-white p-2 bg-secondary">No replies for this post</h1>
              @endif
          </div>
             <div class="container text-center mt-2">Leave a reply</div>
             <div class="card-body">
             <form action="{{route('posts.reply', $post->id )}}" method="post">
               @csrf
                 <textarea name="reply" class="form-control" id="reply" cols="30" rows="10" placeholder="Leave a reply"></textarea>
                 <input type="submit" value="Submit reply" class="btn btn-success mt-2">
             </form>
             </div>

         </div>
             </div>
                    </div>
                {{-- </div> --}}

                {{-- </div>  --}}





@endsection
