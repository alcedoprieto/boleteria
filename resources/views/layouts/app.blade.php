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
                <!-- Logo -->
                <a href="#" class="logo">
                    <b>Frequenza</b>
                </a>
                <!-- Header Navbar -->
                <nav role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" data-toggle="offcanvas" role="button">
                        <span >Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div >
                        <ul>
                            <!-- User Account Menu -->
                            @guest
                            <li>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li>
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                            @else
                            <li>
                                <!-- Menu Toggle Button -->
                                <a href="#" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                    alt="User Image"/>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span >{!! Auth::user()->name !!}</span>
                                </a>
                                <ul>
                                    <!-- The user image in the menu -->
                                    <li >
                                        <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                        alt="User Image"/>
                                        <p>
                                            {!! Auth::user()->name !!}
                                            <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li>
                                        <div >
                                            <a href="#" >Profile</a>
                                        </div>
                                        <div >
                                            <a href="{!! url('/logout') !!}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Sign out
                                            </a>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @endguest
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            @auth
            @include('layouts.sidebar')
            @endauth
            <!-- Content Wrapper. Contains page content -->
            <div>
                @yield('content')
            </div>
            <!-- Main Footer -->
            <footer class="main-footer" style="max-height: 100px;text-align: center">
                <strong>Copyright © 2018 <a href="http://frequenza.ec" target="_blank">Frequenza</a>.</strong> All rights reserved.
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