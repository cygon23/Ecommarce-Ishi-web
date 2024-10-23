<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
            <span>
                Ishi-Tech
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('shop-home') }}">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('why-home') }}">
                        Why Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('testmonial-home') }}">
                        Testimonial
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact-home') }}">Contact Us</a>
                </li>
            </ul>
            <div class="user_option">
                @guest
                    <a href="{{ route('login') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Login</span>
                    </a>

                    <a href="{{ route('register') }}">
                        <i class="fa fa-vcard" aria-hidden="true"></i>
                        <span>Register</span>
                    </a>
                @endguest

                @auth

                    <a href="{{ url('mycart') }}" class="nav-link">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        <span class="badge bg-primary">{{ $count ?? 1 }}</span>
                    </a>

                    <a href="{{ url('myOrders') }}" class="nav-link ">
                        <i class="fa fa-box fa-lg" aria-hidden="true"></i>
                        <span class="badge bg-danger">
                            orders
                        </span>
                    </a>


                    <form class="form-inline ">
                        <button class="btn nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>

                    <form style="padding: 15px" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </nav>
</header>
