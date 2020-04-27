@extends('layouts.app')
@section('content')
    <a href="/posts/create" class="btn btn-primary mb-1">Create a post</a>
    @if (count($posts)> 0)
                                  <idv class="card ">
                <div class="card-header text-center ">
                    <h3>Your Posts</h3>
                </div>

                <div class="card-body ">
                    <table class="table table-bordered">
                        <tr>
                            <th class=" ">ID</th>
                            <th class=" ">Topic</th>
                            <th class=" ">View</th>
                            <th class=" ">Delete</th>
                        </tr>

                        <tr>
                            @foreach ($posts as $post)
                            <td class="">{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}} " class="btn btn-success"> Read</a></td>
                            <td>{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}
                        </td>
                        </tr>

                    @endforeach

                    </table>
                </div>
</idv>
  @else
<div class="my-5 card-body">
    <h1 class="text-center">{{'You have no posts'}}</h1>

</div>
  @endif
@endsection
