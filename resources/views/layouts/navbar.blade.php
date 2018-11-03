    <nav role="navigation">
        <div>
            <ul> 
                @auth
            @include('layouts.infoUser')
            @endauth
            @include('layouts.menuAdmin')
                <!-- User Account Menu -->
                @guest
                <li >
                    <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li >
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
                @else
                <li >
                    <!-- Menu Toggle Button -->
                    <a href="#" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span>{!! Auth::user()->name !!}</span>
                    </a>
                    <ul >
                        <!-- The user image in the menu -->
                        <li >
                            <p>
                                {!! Auth::user()->name !!}
                                <small>Miembro desde {!! Auth::user()->created_at->format('M. Y') !!}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li>
                            <div>
                                <a href="#">Perfil</a>
                            </div>
                            <div >
                                <a href="{!! url('/logout') !!}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Salir   
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