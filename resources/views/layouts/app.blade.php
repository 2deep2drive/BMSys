<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    <style>
       

    </style>
</head>

<body class="body">
    <div id="app" class="">
       
        <main class="main">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#pass-show").on('click', function() {

                // $("#password").attr("type");

                if (($(".password").attr("type")).toLowerCase() == 'password') {
                    $(".password").attr("type", 'text');
                    $("#pass-show").html('<i class="far fa-eye-slash"></i>');
                } else {
                    $(".password").attr("type", 'password');
                    $("#pass-show").html('<i class="fas fa-eye"></i>');
                }

            });





        });
    </script>


</body>

</html>
