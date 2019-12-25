@extends('layouts.app')
@section('content')
<?php
$allmsg = count($msg);
?>      <div class="card-hearder text-center">
@if ($allmsg === 1)
<h1>{{$allmsg}} Message Received From Users</h1>
@else
<h1>{{$allmsg}} Messages Received From Users</h1>
@endif
</div>
    @if (count($msg) > 0)
    @foreach ($msg as $message)
    <div class="card">

            <div class="card-body">
        <ul class="list-group">

                  <li class="list-group-item">Name: {{$message->name}}</li>
            <li class="list-group-item">Email: {{$message->email}}</li>
            <li class="list-group-item">Message: {{$message->message}}</li>
            <li class="list-group-item">Time: {{$message->created_at}}</li>
             </ul>
             <li class="list-group-item">Attachment:
            <img style="width:100%;" style="height:40px;" src="/storage/images/{{$message->attachment}}" alt="attachment">
            </li>

            {!!Form::open(['action' => ['PagesController@destroy', $message->id], 'method' => 'POST']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger',  'float-left'])}}
            {!!Form::close() !!}

        </div>
    </div>
    <br>

    @endforeach
    @else
    <h1>No Messages</h1>

    @endif
@endsection
