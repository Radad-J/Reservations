<nav class="navbar navbar-expand-lg navbar-dark">
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

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">Other</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('locality.index')}}">Localities</a>
                    <a class="dropdown-item" href="{{route('artist.index')}}">Artists</a>
                    @if (Auth::check() && Auth::user()->role->id === 1)
                        <a class="dropdown-item" href="{{ route('show.excel') }}">Download shows list as an Excel
                            file</a>
                        <a class="dropdown-item" href="{{ route('show.csv') }}">Download shows list as a CSV file</a>
                        <a class="dropdown-item" href="{{ route('show.import') }}">Import the shows</a>
                    @endif
                </div>
            </li>
            @if (Auth::check() && Auth::user()->role->id === 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('administration')}}">Administration</a>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">
            @if(Auth::user())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.show', Auth::id())}}">Profile</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn mt-2" style="color:white">Logout</button>
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
        <!-- Cart link w/ item count-->
            <li class="ml-2 nav-item ">
                <a href="{{ route('cart.index') }}" class="text-white nav-link">Cart <span
                        class="badge badge-pill badge-dark">{{ Cart::count() }}</span></a>
            </li>
        </ul>
    </div>
</nav>
