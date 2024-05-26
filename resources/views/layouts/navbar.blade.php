<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu waves-effect waves-light text-decoration-none" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <a href="{{ route('home') }}">
                <img class="img-fluid" src="{{ asset('img/nav.png') }}" alt="Logo" style="max-width: 75%"/>
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="ti-more"></i>
            </a>
        </div>
    
        <div class="navbar-container container-fluid">
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <a href="#!" class="waves-effect waves-light text-decoration-none">
                        @if (auth()->user()->foto)
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" class="img-radius" alt="User-Profile-Image">
                        @else
                            <img src="{{ asset('img/avatar.png') }}" class="img-radius" alt="User-Profile-Image">
                        @endif
                        <span>{{ auth()->user()->nama }}</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li class="waves-effect waves-light">
                            <a href="/profile" class="dropdown-item">
                                <i class="bi bi-person"></i> Profile
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item p-0"><i class="bi bi-box-arrow-left"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>