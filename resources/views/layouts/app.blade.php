

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
       <script src="{{ asset('js/app.js') }}" defer></script>
       <!-- Fonts -->
       <link rel="dns-prefetch" href="//fonts.gstatic.com">
       <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <title>{{config('app.name', 'Sunny"s Blog')}}</title>

</head>
<body>

        <div class="container">
         @include('layouts.nav')
       @include('layouts.msg')
    @yield('content')

    <br>
          <div class="footer bg-dark text-white " align="center">
              <ul class="inline pt-2 text-decoration-none d-inline pl-3">
                  <li><a href="/about" class="text-white"> About Smart Blog</a></li>
                  <li class="">
                    <a class="text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

                    <a href="https://twitter.com/SunnyOjo4" target="blank"  class="text-primary btn btn-social-icon btn-twitter">
                        <span class="fa fa-twitter fa-2x"></span>
                      </a>
                    <a href="https://web.facebook.com/SunnyOjoNjoku" target="blank" class=" text-info btn btn-social-icon btn-facebook">
                        <span class="fa fa-facebook fa-2x"></span>
                      </a>


                    <a href="https://www.instagram.com/ojoskid_sunny/" target="blank" style="color:#f66d9b" class="btn btn-social-icon btn-instagram">
                        <span class="fa fa-instagram fa-2x "></span>
                      </a>

                  </ul>

        <p class="pb-2 text-center text-white "> copyright &copy; <ins>Sunshinecoder's</ins> Smart-blogging, 2018 - {{ date('Y') }} </p>
        </div>
    </div>

</body>
</html>
</head>
