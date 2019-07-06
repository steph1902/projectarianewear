<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Ariane Wear</title>

  <!-- Scripts -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">

  {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Mukta:300,400,700') }}">
  <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

  <div class="site-navbar bg-white py-2">

    <div class="search-wrap">
      <div class="container">
        <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
        <form action="{{url('searchresult')}}" method="get">
          <input type="text"  name="search" class="form-control" placeholder="Search by product name  and hit enter...">
        </form>
      </div>
    </div>

    <div class="container">
      <div class="d-flex align-items-center justify-content-between">
        <div class="logo">
          <div class="site-logo">
            <a href="{{url('/')}}" class="js-logo-clone">ARIANE WEAR</a>
          </div>
        </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">

                <li><a href="{{ url('newarrival') }}">New Arrival</a></li>
                <li><a href="{{ url('bestseller') }}">Best Seller</a></li>

                <li><a href="{{url('musthaves')}}">Must Haves</a></li>

                <li class="has-children ">
                  <a href="#">Categories</a>
                  <ul class="dropdown">
                    <li><a href="{{url('top')}}">Top</a></li>
                    <li><a href="{{url('dress')}}">Dress</a></li>
                    <li><a href="{{url('outer')}}">Outerwear</a></li>
                    <li><a href="{{url('jumpsuit')}}">Jumpsuit</a></li>
                    <li><a href="{{url('set')}}">Set</a></li>
                  </ul>
                </li>
                @guest
                <li class="has-children">

                  <a href="">My Account</a>

                  <ul class="dropdown">
                    <li>
                      <a href="{{ route('login') }}"> {{ __('Login') }} </a>
                    </li>


                    @if (Route::has('register'))
                    <li>
                      <a class="nav-link" href="{{ route('register') }}">
                        {{ __('Register') }}
                      </a>
                    </li>

                    @else
                    <li class="has-children">
                      <a href="#">
                        {{ Auth::user()->name }}
                      </a>
                    </li>
                    <li>
                      <a href="{{route('logout')}}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    @endif




                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                </li>
              </li>
              @endguest


              <li><a href="{{url('aboutme')}}">About Us</a></li>

            </ul>
          </nav>
        </div>
        <div class="icons">
          <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
          <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
          <a href="{{ url('cart') }}" class="icons-btn d-inline-block bag">
            <span class="icon-shopping-bag"></span>
            {{-- <span class="number">2</span> --}}
          </a>
          <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
        </div>
      </div>
    </div>
  </div>




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
              <li><a href="{{url('productlist')}}">All Products</a></li>
              <li><a href="{{url('newarrival')}}">New Arrival</a></li>
              <li><a href="{{url('bestseller')}}">Best Seller</a></li>
              <li><a href="{{url('musthaves')}}">Must Haves</a></li>
              <li><a href="{{url('cart')}}">Shopping Cart</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-4">
            <ul class="list-unstyled">
              <li><a href="{{url('top')}}">Top</a></li>
              <li><a href="{{url('dress')}}">Dress</a></li>
              <li><a href="{{url('outerwear')}}">Outerwear</a></li>
              <li><a href="{{url('jumpsuit')}}">Jumpsuit</a></li>
              <li><a href="{{url('set')}}">Set</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-4">
            <ul class="list-unstyled">
              <li><a href="{{url('login')}}">Login</a></li>
              <li><a href="{{url('register')}}">Register</a></li>
              <li><a href="{{url('aboutme')}}">About Us</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="block-5 mb-5">
          <h3 class="footer-heading mb-4">Contact Info</h3>
          <ul class="list-unstyled">
            <li class="address">Jakarta</li>
            <li class="phone"><a href="tel://+6287878919818">+6287878919818</a></li>
            <li class="email"><a href="mailto://arianewear@gmail.com">arianewear@gmail.com</li>
            <li class="instagram"><a href="https://www.instagram.com/arianewear">@arianewear</a></li>
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

    {{--  --}}

    <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved | This website is developed by
            <a href="mailto:kairos.projects.id@gmail.com" target="_blank" class="text-primary">Kairos Projects</a><br>
          </p>
        </div>

      </div>

  </div>
</footer>

</html>
