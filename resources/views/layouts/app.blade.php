<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="icon" type="image/png" href="{{ asset('template/img/favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template/img/apple-icon.png') }}" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="{{asset('/template/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/template/css/material-dashboard.css')}}" rel="stylesheet" />
    <link href="{{asset('/template/css/demo.css')}}" rel="stylesheet" />
    <title>Praktikum Algoritma</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="purple" data-background-color="black" data-image="{{asset('template/img/sidebar-1.jpg')}}">
            @include('layouts.sidebar')
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                @include('layouts.navbar')
            </nav>
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                @include('layouts.footer')
            </footer>
        </div>
    </div>
</body>
@include('layouts.scripts')
</html>
