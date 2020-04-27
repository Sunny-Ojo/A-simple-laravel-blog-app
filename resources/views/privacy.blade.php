@extends('layouts.app')
@section('content')
    <div class=" row justify-content-center">
        <div class="col-md-8 col-xs-12">
            <div class="card">
                <div class="card-header text-center"><h1 class="lead">Details Smart Blog</h1></div>
                <div class="card-img-top text-center">
                    <img class="mt-3" src="{{asset('img/sunny.jpg')}}" style="width:80%; height:70%;" alt="">

                </div>

                <div class="card-body text-center">
                    <p>This is just a simple blog app where you can create new posts, edit posts, delete posts and also share to your social networks it's easy and simple to use</p>
  <p>This blog post is created and designed by <a href="https://about.me/sunnyojo"> Sunny ojo.</a></p>
  <p>I am a PHP/Laravel developer with two years of experience in the programming world</p>
  <p>I create websites for people and also seeks to improve my skils in the tech world.</p>
  <p>You can contact me on the social networks listed below </p>
                          </div>
                          <div class="card-footer text-center">
                             <ul class=" ">
    <a href="https://twitter.com/SunnyOjo4" target="blank"  class="text-primary btn btn-social-icon btn-twitter">
        <span class="fa fa-twitter fa-3x"></span>
      </a>
    <a href="https://web.facebook.com/SunnyOjoNjoku" target="blank" class=" text-info btn btn-social-icon btn-facebook">
        <span class="fa fa-facebook fa-3x"></span>
      </a>


    <a href="https://www.instagram.com/ojoskid_sunny/" target="blank" style="color:#f66d9b" class="btn btn-social-icon btn-instagram">
        <span class="fa fa-instagram fa-3x "></span>
      </a>

  </ul>
                          </div>

    </div>

        </div>
    </div>
@endsection
