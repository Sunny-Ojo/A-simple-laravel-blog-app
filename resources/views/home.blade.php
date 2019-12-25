@extends('layouts.app')
@section('content')
    <a href="/posts/create" class="btn btn-primary">Create a post</a>
    <div class="card ">
                <div class="card-header text-center ">
                    <h3>Your Posts</h3>
                </div>

                <div class="card-body ">
                    <table class="table table-bordered">
                        <tr>
                            <th class=" ">Topic</th>
                            <th class=" "><i class="fa fa-desktop fa-2x"></i></th>
                            <th class=" "><i class="fa fa-edit fa-2x"></i></th>
                            <th class=" "><i class="fa fa-trash fa-2x"></i></th>
                        </tr>

                                 @if (count($posts)> 0)
                                 @foreach ($posts as $post)
                        <tr>
                            <td class=""><h2>{{$post->title}}</h2></td>
                            <td><a href="/posts/{{$post->id}} " class="btn btn-success"> Read</a></td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td>{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}
                        </td>
                        </tr>

                    @endforeach
                    @else
                    <h1>{{'You have no posts'}}</h1>
                    @endif
                    </table>
                </div>
</div>

@endsection
