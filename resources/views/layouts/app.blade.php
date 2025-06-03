<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Les Roches De Benslimane">
    <meta name="author" content="Les Roches De Benslimane">
    <meta name="keywords" content="lot terrain R+4, Villa , Immeuble , Immobilier">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontside/assets/images/favicon.ico')}}" />

    <!-- TITLE -->
    <title>Les Roches De Benslimane</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('clientside/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{asset('clientside/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('clientside/assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{asset('clientside/assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{asset('clientside/assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('clientside/assets/css/icons.css')}}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('clientside/assets/colors/color1.css')}}" />

</head>

<body class="app sidebar-mini ltr login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{asset('clientside/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->


@yield('content')


    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{asset('clientside/assets/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('clientside/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{asset('clientside/assets/js/show-password.min.js')}}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{asset('clientside/assets/js/generate-otp.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset('clientside/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{asset('clientside/assets/js/themeColors.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('clientside/assets/js/custom.js')}}"></script>

</body>

</html>
