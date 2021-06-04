<nav class="navbar navbar-expand-lg navbar-dark">
    <!-- Cart link w/ item count-->
    <div class="col-4 pt-1">
        <a href="{{ route('cart.index') }}" class="text-white">Cart <span class="badge badge-pill badge-dark">{{ Cart::count() }}</span></a>
    </div>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.index')}}">Shows</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('locality.index')}}">Localities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('artist.index')}}">Artists</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @if(Auth::user())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.show', Auth::id())}}">Profile</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Sign up</a>
                </li>
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
