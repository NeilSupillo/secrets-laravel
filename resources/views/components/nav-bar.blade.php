<nav class="navbar navbar-expand-lg bg-body-tertiary bg-white">
    <div class="container-fluid">
        <a class="navbar-brand text-dark" href="/">
            <i class="fas fa-key fa-1x"></i> Secrets
        </a>

        @guest
            <div class="nav-con">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-dark btn-md" href="{{ route('register') }}" role="button">Register</a>
                        <a class="btn btn-dark btn-md" href="{{ route('login') }}" role="button">Login</a>
                    </li>
                </ul>
            </div>
        @else
            <div class="hamburger-menu">
                <div class="hamburger-icon" onclick="toggleMenu()">
                    <a class="btn btn-md" role="button">{{ Auth::user()->name }} ▼</a>

                </div>
                <div class="menu-links">

                    <li>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link :href="route('dashboard')">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="pointer"
                                onclick="event.preventDefault();
                            this.closest('form').submit();">Log
                                Out</a>
                        </form>
                    </li>

                </div>
            </div>
        @endguest
    </div>
</nav>
