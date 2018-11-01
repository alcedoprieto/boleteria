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
            @include('layouts.navbar')
        </header>
        <!-- Cuerpo -->
        <div class="row">
            <div class="col-1-of-2">col1 of 2</div>
            <div class="col-1-of-2">col1 of 2</div>
        </div>
        <div class="row">
            <div class="col-1-of-3">col1 of 3</div>
            <div class="col-1-of-3">col1 of 3</div>
            <div class="col-1-of-3">col1 of 3</div>
        </div>
         <div class="row">
            <div class="col-1-of-3">col1 of 3</div>
            <div class="col-2-of-3">col2 of 3</div>
        </div>

        <div class="row">
            <div class="col-1-of-4">col1 of 4</div>
            <div class="col-1-of-4">col1 of 4</div>
            <div class="col-1-of-4">col1 of 4</div>
            <div class="col-1-of-4">col1 of 4</div>
        </div>
        <div class="row">
            <div class="col-1-of-4">col1 of 4</div>
            <div class="col-2-of-4">col2 of 4</div>
            <div class="col-1-of-4">col1 of 4</div>
        </div>
        <div class="row">
            <div class="col-3-of-4">col3 of 4</div>
            <div class="col-1-of-4">col1 of 4</div>
        </div>
    <!-- Main Footer -->
    <footer class="main-footer">
        @include('layouts.footer')
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