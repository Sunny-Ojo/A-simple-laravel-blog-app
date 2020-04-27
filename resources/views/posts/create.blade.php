@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-xs-12 col-md-8">
        <div class="card my-5">
            <div class="card-header">
                <h4 class="text-center">Create a Post</h4>

            </div>
            <div class="card-body">
                  {!! Form::open(['action'=> 'PostsController@store', 'method'=> 'POST',  'enctype'=> 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title:')}}
                {{Form::text('title', '', ['class'=> 'form-control'])}}
                  </div>
                  <div class="form-group">
                    {{Form::label('category', 'Category:')}}
                    {{Form::text('category', '', ['class'=> 'form-control'])}}
                      </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['class'=> 'form-control'])}}
                  </div>
                  <div class="form-group">
                    <small>Choose blog image:</small> <br>
                    {{Form::file('image')}}
                  </div>
                  <div class="form-group">
                    {{Form::submit('Submit', ['class'=> 'btn btn-primary btn-block'])}}
                  </div>
        {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


@endsection
