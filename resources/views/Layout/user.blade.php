<!DOCTYPE html>
<html lang="en">
<head>

     <!-- /SEO Ultimate -->
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
     <meta charset="utf-8">
     <link rel="icon" type="image/png" sizes="192x192"
         href="{{ asset('assets/images/logoUGMINI.png') }}">

     <link rel="manifest" href="{{ asset('assetUser/images/favicon/manifest.json') }}">
     <link rel="stylesheet"
         href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <meta name="msapplication-TileColor" content="#ffffff">
     <meta name="msapplication-TileImage" content="{{ asset('assetUser/images/favicon/ms-icon-144x144.png') }}">
     <meta name="theme-color" content="#ffffff">
     <!-- Latest compiled and minified CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link href="{{ asset('assetUser/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
     <!-- Bootstrap JS should not be linked as a stylesheet, correcting the mistake -->
     <script src="{{ asset('assetUser/js/bootstrap.min.js') }}"></script>
     <!-- Font Awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <!-- StyleSheet link CSS -->
     <link href="{{ asset('assetUser/css/style.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assetUser/css/special_classes.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assetUser/css/mediaqueries.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assetUser/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assetUser/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @yield('content')






    <script src="{{ asset('assetUser/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('assetUser/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetUser/js/custom.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assetUser/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assetUser/js/carousel.js') }}"></script>
    <script src="{{ asset('assetUser/js/counter.js') }}"></script>
    <script src="{{ asset('assetUser/js/animation.js') }}"></script>

    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/65fe6e7d1ec1082f04da54ea/1hpktv6kf';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
</body>
</html>
