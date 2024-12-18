<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
            <span>
                OMS-SYSTEM
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">{{ __('messages.home') }} <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('shop-home') }}">
                        {{ __('messages.shop') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('why-home') }}">
                        {{ __('messages.about') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('testmonial-home') }}">
                        {{ __('messages.tesmonial') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact-home') }}">{{ __('messages.contact-us') }}</a>
                </li>
            </ul>
            <div class="user_option">
                @guest
                    <a href="{{ route('login') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>{{ __('messages.login') }}</span>
                    </a>

                    <a href="{{ route('register') }}">
                        <i class="fa fa-vcard" aria-hidden="true"></i>
                        <span>{{ __('messages.register') }}</span>
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
                            {{ __('messages.orders') }}
                        </span>
                    </a>


                    <form class="form-inline d-flex align-items-center">
                        <!-- Language Dropdown -->
                        <div class="dropdown me-2">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">Select language
                                {{-- {{ __('messages.select_language') }} --}}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                <li><a class="dropdown-item"
                                        href="{{ route('change.lang', ['lang' => 'en']) }}">English</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('change.lang', ['lang' => 'sw']) }}">Swahili</a></li>
                            </ul>
                        </div>

                        <!-- Search Form -->
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>






                    <form style="padding: 15px" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                            <span>{{ __('messages.logout') }}</span>
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </nav>
</header>
