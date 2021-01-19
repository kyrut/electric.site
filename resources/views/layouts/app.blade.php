<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .cover-image{
            object-fit: cover;
            object-position: center;
            z-index: 1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        .lead{
            font-size: 1.25rem;
            font-weight: 300;
            color: white;
            line-height: 1.5;
        }
        .cover-container{
            max-width: 42rem;
        }
        h1{
            font-size: calc( 22px + 16 * ( 100vw / 1140 ));
        }
        @media (max-width: 767.9px) {
            h1{
                font-size: calc( 22px + ( 16 + 16 * 0.7 ) * ( ( 100vw - 320px ) / 1140 ));
            }
            .lead{
                font-size: calc( 15px + ( 14 * 0.7 ) * ( (100vw - 320px ) / 1140 ) );
            }
            .nav-link{
                padding: 0.5rem 0.24rem;
            }
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="text-center" style="height:95vh ">
    <img src="{{asset('storage/images/bg2.jpg')}}" class="cover-image position-fixed">
    <div id="app" class="d-flex h-100 p-3 mx-auto flex-column justify-content-between" style="max-width: 40rem">
        <header class="masthead position-relative" style="z-index: 10">
            <v-header></v-header>
        </header>
        <router-view></router-view>
        <div class="uk-spinner"></div>
        <footer class="mastfoot position-relative" style="z-index: 1">
            <div class="inner" style="color: whitesmoke;">
                <p>Наши контакты email: <a href="mailto:ctc-kavkaz@yndex.ru" style="color: whitesmoke;">ctc-kavkaz@yndex.ru</a>, телефон <a href="tel:+79288171250" style="color: whitesmoke;">+7 928 817 12 50</a>.</p>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        var laravel = {
            'csrfToken' : '{{ @csrf_token() }}'
        }
    </script>
</body>
</html>
