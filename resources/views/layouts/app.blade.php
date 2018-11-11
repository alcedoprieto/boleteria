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
        <script src="https://cdn.kushkipagos.com/kushki.min.js"></script>
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
        @yield('scripts')
    </body>
</html>