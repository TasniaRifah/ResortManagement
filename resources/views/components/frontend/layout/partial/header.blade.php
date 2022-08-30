<header class="header mb-3 sticky-top">
    <!--
      *** TOPBAR ***   _________________________________________________________
    -->
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offer mb-3 mb-lg-0" style="text-align:right">
                    <h4 style="color:aqua"> Resort Management System </h4>
                </div>
                <div class="col-lg-4 text-center text-lg-right">
                    <ul class="menu list-inline mb-0 " style="padding-top:3px;">

                        @auth
                            <li class="list-inline-item">
                                @if (Auth::user()->role_id == 1)
                                    <a href="{{ route('backend.index') }}">{{ Auth::user()->name . "'s Dashboard" }}</a>
                                @elseif(Auth::user()->role_id == 2)
                                    <a href="{{ route('customer.bookingList', auth()->user()->name ?? '') }}">{{ (Auth::user()->name)."'s Dashboard" }}</a>
                                @endif
                            </li>
                        @endauth

                        @guest 
                            <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                            <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
                        @endguest

                        {{-- <li class="list-inline-item"><a href="contact.html">Contact</a></li> --}}
                        {{-- <li class="list-inline-item"><a href="#">Recently viewed</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <x-frontend.layout.partial.login-modal />


    </div>
    <div class="">
        <nav class="navbar navbar-expand-lg ">
            <div class="container"><a href="{{ route('Homepage') }}" class="navbar-brand home"><img
                        src="{{ asset('ui/frontend/img/logo2.png') }}" alt="Obaju logo" class="d-none d-md-inline-block"
                        height="80"><img src="img/logo-small.png" alt="Obaju logo"
                        class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
                <div class="navbar-buttons">
                    <button type="button" data-toggle="collapse" data-target="#navigation"
                        class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle
                            navigation</span><i class="fa fa-align-justify"></i></button>
                    <button type="button" data-toggle="collapse" data-target="#search"
                        class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i
                            class="fa fa-search"></i></button><a href="basket.html"
                        class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
                </div>
                <div id="navigation" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ route('Homepage') }}" class="nav-link active">Home</a></li>

                        {{-- @foreach ($categories as $category) --}}
                        {{-- <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown"
                                data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Category<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="row">

                                        <ul class="list-unstyled mb-3">
                                            @foreach ($categories as $category)
                                                <li class="nav-item">
                                                    <a href="{{ route('categories.products', ['category' => $category->id]) }}"
                                                        class="nav-link">{{ $category->categories_name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>


                                    </div>
                                </li>
                            </ul>
                        </li> --}}


                    </ul>

                </div>
            </div>
        </nav>

        <div id="search" class="collapse">
            <div class="container">
                <form role="search" class="ml-auto">
                    <div class="input-group">
                        <input type="text" placeholder="Search" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</header>
