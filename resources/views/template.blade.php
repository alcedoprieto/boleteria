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
        <header class="header-container">
            @include('layouts.navbar')
        </header>

        @yield ('main')
        <!-- Cuerpo -->
        <div class="main">
            <main class="main-container row">
                <div class="main-container_center col-2-of-3">
                    <div class="main-container_center__maintitle">
                        <h1>Frequenza News</h1>
                    </div>
                    <div id="news1-content" class="main-container_center-content active">
                        
                        <div class="main-container_center-content__img">
                            <img src="/img/konrad.png" alt="" class="main-container_center-content__img-1">
                        </div>
                        <div class="main-container_center-content__title">
                            <h2>Konrad Black</h2>
                        </div>
                        <div class="main-container_center-content__text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa animi placeat deserunt fuga sit deleniti minus quisquam voluptatum, perferendis eum! Dolores nulla, vel eligendi libero autem eaque inventore officiis. Sequi!</p>
                        </div>
                    </div>
                    <div id="news2-content" class="main-container_center-content">
                        
                        <div class="main-container_center-content__img">
                            <img src="/img/afriqua.jpg" alt="" class="main-container_center-content__img-1">
                        </div>
                        <div class="main-container_center-content__title">
                            <h2>Afriqua</h2>
                        </div>
                        <div class="main-container_center-content__text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa animi placeat deserunt fuga sit deleniti minus quisquam voluptatum, perferendis eum! Dolores nulla, vel eligendi libero autem eaque inventore officiis. Sequi!</p>
                        </div>
                    </div>
                    <div class="main-container_center-selector">
                        <a href="#news1-content">.</a>
                        <a href="#news2-content"">.</a>
                    </div>
                </div>
                <div class="main-container_side col-1-of-3 ">
                    <div class="main-container_side__maintitle">
                        <h1>Próximos Eventos</h1>
                    </div>
                    <div class="main-container_side__title">
                        <h2>Frequenza Launch Party</h2>
                    </div>
                    <div class="main-container_side__imgcont">
                        <img class="main-container_side__imgcont-1" src="img/flyer2.jpg" alt="">
                    </div>
                    <div class="main-container_side__description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    
                </div>
                
            </main>
        </div>
        <!--
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
        -->
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
        <script>
        jQuery(document).ready(function($) {
        tab = $('.main-container_center-selector a');
        tab.on('click', function(event) {
        event.preventDefault();
        tab.removeClass('active');
        $(this).addClass('active');
        tab_content = $(this).attr('href');
        $('div[id$="-content"]').removeClass('active');
        $(tab_content).addClass('active');
        });
        });</script>
    </body>
</html>