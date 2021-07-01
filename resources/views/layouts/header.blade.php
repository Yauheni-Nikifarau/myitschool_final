<header class="header">
    <div class="container">

        <a href="/" class="header-logo">CoolTrip</a>

        <input type="checkbox" id="burger">

        <label for="burger" class="header-menu-button">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <nav class="header-navigation">
            <ul>
                <li><a href="/" class="header-navigation-link">Main</a></li>
                <li><a href="/trips" class="header-navigation-link">Trips</a></li>
                <li><a href="/hotels" class="header-navigation-link">Hotels</a></li>
                <li><a href="/about" class="header-navigation-link">About us</a></li>
                @if (auth()->check())
                <li><a href="/orders" class="header-navigation-link">My Orders</a></li>
                @endif
            </ul>
        </nav>
        @if (! auth()->check())
        <a class="header-sign" href="/login">Sign in</a>
        @else
            <form action="/logout" method="POST">
                @csrf
                <a class="header-sign" href="#"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Logout
                </a>
            </form>
        @endif

    </div>
</header>
