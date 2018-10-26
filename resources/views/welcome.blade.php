<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Frequenza</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <!-- Main Header -->
        <header>
            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo">
                <b>Frequenza</b>
            </a>
            @include('layouts.navbar')
        </header>
        <!-- Cuerpo -->
        <div class="content">
        <main class="soon"></main>
    </div>
    <!-- Main Footer -->
    <footer >
        <strong>Copyright © 2018 <a href="http://frequenza.ec" target="_blank">Frequenza</a>.</strong> All rights reserved.
    </footer>
    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
    @yield('scripts')
</body>
</html>