<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Frequenza</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Estilos Personales -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('css')
        <!-- jQuery 3.1.1 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <div>
            <!-- Main Header -->
            <header >
                <!-- Header Navbar -->
                @include('layouts.navbar')
            </header>
            <!-- Content Wrapper. Contains page content -->
            <main>
                @yield('content')
            </main>
            <!-- Main Footer -->
            <footer class="main-footer">
                @include('layouts.footer')
            </footer>
        </div>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
        <!-- Scripts Personales -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>