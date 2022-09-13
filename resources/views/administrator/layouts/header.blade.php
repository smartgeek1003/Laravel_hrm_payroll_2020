<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">@if(!empty(auth()->user()->avatar))
                        <img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="user-image" alt="User Image">
                        @else
                        <img src="{{ asset('public/profile_picture/blank_profile_picture.png') }}" class="user-image" alt="User Image">
                        @endif</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">@if(!empty(auth()->user()->avatar))
                        <img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="user-image" alt="User Image">
                        @else
                        <img src="{{ asset('public/profile_picture/blank_profile_picture.png') }}" class="user-image" alt="User Image">
                        @endif</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ __('Toggle navigation') }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(!empty(auth()->user()->avatar))
                        <img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="user-image" alt="User Image">
                        @else
                        <img src="{{ asset('public/profile_picture/blank_profile_picture.png') }}" class="user-image" alt="User Image">
                        @endif

                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
                        <!-- User image -->
                        <li class="user-header">
                            @if(!empty(auth()->user()->avatar))
                            <img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="img-circle" alt="User Image">
                            @else
                            <img src="{{ asset('public/profile_picture/blank_profile_picture.png') }}"  class="img-circle" alt="User Image">
                            @endif
                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ __('Member Since') }} {{ date("d F Y", strtotime(Auth::user()->created_at)) }} </small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/profile/user-profile') }}" class="btn btn-default btn-flat">{{ __('Profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Sign out') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>