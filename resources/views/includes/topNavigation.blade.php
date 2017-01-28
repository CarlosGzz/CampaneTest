<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">Register</a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="/images/profile{{ Auth::user()->user }}.jpg" alt="">
                            {{ Auth::user()->name }} 
                            <span class=" fa fa-angle-down"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
