<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('homepage') }}">
        <i class="fas fa-plus-circle fa-2x"></i>
        <strong>Clinic Care</strong>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        @auth
        <ul class="navbar-nav navbar-sidenav" id="accordion">
                @if(Auth::user()->isAdmin())
                    @include('admin.inc.navbar')
                @endif
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fas fa-angle-left"></i>
                </a>
            </li>
        </ul>
        @endauth
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }} <span
                                class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(!Auth::user()->isAdmin())
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                {{ __('Profile') }}
                            </a>
                        @endif
                        <button class="dropdown-item"
                                onclick="logout(event)">
                            {{ __('Logout') }}
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

@push('script')
    <script>
        function logout(e) {
            e.preventDefault();
            document.getElementById('logout-form').submit();
        }
    </script>
@endpush