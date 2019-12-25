@extends('layouts.app')
@section('content')
<h1>Create a Post</h1>
        {!! Form::open(['action'=> 'PostsController@store', 'method'=> 'POST',  'enctype'=> 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class'=> 'form-control', 'placeholder'=> 'Title'])}}
                  </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['class'=> 'form-control', 'placeholder'=> 'Body'])}}
                  </div>
                  <div class="form-group">
                    {{Form::file('image')}}
                  </div>
                  <div class="form-group">
                    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                  </div>
        {!! Form::close() !!}

@endsection
