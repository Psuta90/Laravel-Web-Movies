<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    {!! SEO::generate() !!}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5SRP3D5BFL"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-5SRP3D5BFL');
    </script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--My Style Css-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--favicon-->
    <link rel="shortcut icon" href="https://img.icons8.com/ios-glyphs/30/000000/film-reel--v2.png" type="image/x-icon">
    {{-- ads --}}
    @if (Route::currentRouteName() == 'tv.show' || Route::currentRouteName() == 'serial.show' || Route::currentRouteName() == 'film.show' || Route::currentRouteName() == 'moviespage' || Route::currentRouteName() == 'serialpage')   
    <script type='text/javascript' src='//pl16496462.highperformancecpm.com/e5/24/6a/e5246ae465c6885d63f8bb03fdf8c3a1.js'></script>
    @endif
  </head>
  <body>
    @include('part-layout.navbar')
    @yield('content')
    @include('part-layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
