@php
    $date = date('Y');
@endphp

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
          <div class="footer bg-dark">
        <h2 class="text-center text-white ">All rights reserved... copyright &copy; 2018 - <?php echo $date; ?> </h2>
        </div>
    </div>

</body>
</html>
</head>
