@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <div class="row">
            <div class="col-md-4 col-lg-4">
            <img src="{{asset('img/sunny.jpg')}}" style="width:100%; height:100%;" alt="">
            </div>
            <div class="col-md-8 col-lg-8">
  <h2>This blog post is created and designed by <a href="https://about.me/sunnyojo"> Sunny ojo.</a></h2>
  <h3>I am a PHP/Laravel developer with years of experience in the programming world</h3>
  <h3>I create websites for people and also work in the tech world, I am also a freelancer with 3years of experience</h3>
  <h3>You con contact me on the social networks listed below </h3>
  <ul>
    <a class="btn btn-social-icon btn-twitter">
        <span class="fa fa-twitter fa-3x"></span>
      </a>
    <a class="btn btn-social-icon btn-facebook">
        <span class="fa fa-facebook fa-3x"></span>
      </a>
    <a class="btn btn-social-icon btn-youtube">
        <span class="fa fa-youtube fa-3x  "></span>
      </a>

    <a class="btn btn-social-icon btn-instagram">
        <span class="fa fa-instagram fa-3x "></span>
      </a>

  </ul>
            </div>
        </div>
    </div>
@endsection
