<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

        <div class="site-navbar bg-white py-2">

                <div class="search-wrap">
                  <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="#" method="post">
                      <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                    </form>
                  </div>
                </div>

                <div class="container">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                      <div class="site-logo">
                        <a href="index.html" class="js-logo-clone">ARIANE WEAR</a>
                      </div>
                    </div>
{{--
New Arrival
Best Seller
Must Haves
Categories
 Top
 Bottom
 Dress
 Outerwear
 Jumpsuit
 Set
My Account
About Us
--}}
                    <div class="main-nav d-none d-lg-block">
                      <nav class="site-navigation text-right text-md-center" role="navigation">
                        <ul class="site-menu js-clone-nav d-none d-lg-block">

                                <li><a href="#">New Arrival</a></li>
                                <li><a href="#">Best Seller</a></li>
                                <li><a href="#">Must Haves</a></li>

                          <li class="has-children ">
                            <a href="#">Categories</a>
                            <ul class="dropdown">
                              <li><a href="#">Top</a></li>
                              <li><a href="#">Bottom</a></li>
                              <li><a href="#">Dress</a></li>
                              <li><a href="#">Outerwear</a></li>
                              <li><a href="#">Jumpsuit</a></li>
                              <li><a href="#">Set</a></li>

                              {{-- <li class="has-children">
                                <a href="#">Sub Menu</a>
                                <ul class="dropdown">
                                  <li><a href="#">Menu One</a></li>
                                  <li><a href="#">Menu Two</a></li>
                                  <li><a href="#">Menu Three</a></li>
                                </ul>
                              </li> --}}
                            </ul>
                          </li>
                          @guest
                          <li class="has-children">

                            <a href="">My Account</a>

                            <ul class="dropdown">
                                <li><a href="{{ route('login') }}"> {{ __('Login') }} </a></li>


                              @if (Route::has('register'))
                                <li> <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> </li>
                              @endif
                        @else
                              <li class="has-children"><a href="#">{{ Auth::user()->name }}</a></li>
                              <li>
                                  <a href="{{route('logout')}}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                                </a>
                               </li>

                            </ul>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>




                          </li>
                          @endguest

                            <li><a href="#">About Us</a></li>
                          {{-- <li><a href="#">New Arrivals</a></li> --}}
                          {{-- <li><a href="#">Contact</a></li> --}}
                        </ul>
                      </nav>
                    </div>
                    <div class="icons">
                      <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                      <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
                      <a href="cart.html" class="icons-btn d-inline-block bag">
                        <span class="icon-shopping-bag"></span>
                        <span class="number">2</span>
                      </a>
                      <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                    </div>
                  </div>
                </div>
              </div>


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer class="site-footer custom-border-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <h3 class="footer-heading mb-4">Promo</h3>
          <a href="#" class="block-6">
            <img src="images/about_1.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
            <h3 class="font-weight-light  mb-0">Finding Your Perfect Shirts This Summer</h3>
            <p>Promo from  July 15 &mdash; 25, 2019</p>
          </a>
        </div>
        <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
          <div class="row">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">Quick Links</h3>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Sell online</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Shopping cart</a></li>
                <li><a href="#">Store builder</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Mobile commerce</a></li>
                <li><a href="#">Dropshipping</a></li>
                <li><a href="#">Website development</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Point of sale</a></li>
                <li><a href="#">Hardware</a></li>
                <li><a href="#">Software</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="block-5 mb-5">
            <h3 class="footer-heading mb-4">Contact Info</h3>
            <ul class="list-unstyled">
              <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
              <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
              <li class="email">emailaddress@domain.com</li>
            </ul>
          </div>

          <div class="block-7">
            <form action="#" method="post">
              <label for="email_subscribe" class="footer-heading">Subscribe</label>
              <div class="form-group">
                <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                <input type="submit" class="btn btn-sm btn-primary" value="Send">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>

      </div>
    </div>
  </footer>

</html>
