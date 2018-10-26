    <nav role="navigation">
        <div>
            <ul>
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
                        <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span>{!! Auth::user()->name !!}</span>
                    </a>
                    <ul >
                        <!-- The user image in the menu -->
                        <li >
                            <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg" alt="User Image"/>
                            <p>
                                {!! Auth::user()->name !!}
                                <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li>
                            <div>
                                <a href="#">Profile</a>
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