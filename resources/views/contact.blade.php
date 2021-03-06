@extends('layouts.app')
@section('content')
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8 col-xs-12">
                 <div class="card">
                     <div class="card-header">
                            <h1 class="text-center lead"> Contact Us</h1>

                     </div>
                     <div class="card-body">
                        {!! Form::open(['action'=> 'PagesController@contact', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter your name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email')}}
                            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter your Email'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('message', 'Message')}}
                            {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter your Message'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('attachment', 'Add an attachment')}} <br>
                            {{Form::file('attachment')}}
                        </div>
                        <div class="form-group">
                            {{Form::submit('Send', ['class' => 'btn btn-success btn-block'])}}
                        </div>

                    {!! Form::close() !!}
                     </div>
                 </div>
             </div>
         </div>

</div>
@endsection
