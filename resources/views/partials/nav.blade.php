<nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm">

    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src="{{asset('images/LOGO.png')}}" alt="">
        </a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ 'home' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link {{ isRouteActive('quees') }}" href="{{ route('quees') }}">
                        ¿Qué es OneHouser?
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isRouteActive('contacto') }}" href="{{ route('contacto') }}">
                        Contacto
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ 'novedades*' }}" href="{{ route('novedades.index') }}">
                        Novedades
                    </a>
                </li>
                {{-- @auth
                    @include('partials.userbar')
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Iniciar sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Crear cuenta
                        </a>
                    </li>
                @endauth --}}
            </ul>
    </div>
</nav>
