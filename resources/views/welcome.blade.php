@extends('layouts.app')

@section('content')
<body>

  <div class="site-wrap">

{{--
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
              <!-- <a href="index.html" class="js-logo-clone">A R I A N E  W E A R </a> -->
              <a href="#"></a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="has-children active">
                  <a href="index.html">Home</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                    <li class="has-children">
                      <a href="#">Sub Menu</a>
                      <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>

                <li><a href="shop.html">Shop</a></li>
                <li><a href="#">Catalogue</a></li>
                <li><a href="#">New Arrivals</a></li>
                <li><a href="contact.html">Contact</a></li>
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
    </div> --}}

    <div class="site-blocks-cover" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2019</h2>
            <h1>Arrivals Sales</h1>
            <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
            </div>
          </div>
          <div class="col-md-6 order-1 align-self-end">
            <img src="{{asset('images/Foto Produk Ariane Wear/Indy Outer/Army Green/INDY OUTER (6).jpg')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="title-section mb-5">
          <h2 class="text-uppercase"><span class="d-block">Discover</span> The Collections</h2>
        </div>
        <div class="row align-items-stretch">
          <div class="col-lg-8">
            <div class="product-item sm-height full-height bg-gray">
              <a href="#" class="product-category">Top <span>25 items</span></a>
              <img src="{{asset('images/Foto Produk Ariane Wear/Alexa Top/Black/ALEXA TOP.jpeg')}}" alt="Image" class="img-fluid">
            </div>
          </div>
          {{-- C:\Users\User\Documents\laravelproject\projectariane\public\images\Foto Produk Ariane Wear\ --}}
          <div class="col-lg-4">
            <div class="product-item sm-height bg-gray mb-4">
              <a href="#" class="product-category">Outerwear <span>25 items</span></a>
              <img src="{{asset('images/Foto Produk Ariane Wear/Clara Outer/White/CLARA OUTER (1).jpg')}}" alt="Image" class="img-fluid">
            </div>
            {{-- C:\Users\User\Documents\laravelproject\projectariane\public\images\Foto Produk Ariane Wear\ --}}
            <div class="product-item sm-height bg-gray">
              <a href="#" class="product-category">Jumpsuit <span>25 items</span></a>
              <img src="{{asset('images/Foto Produk Ariane Wear/Kylie Jumpsuit/Nude/KYLIE JUMPSUIT (2).jpeg')}}" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>




    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section mb-5 col-12">
            <h2 class="text-uppercase">Popular Products</h2>
          </div>
        </div>
        <div class="row">
            @foreach($products as $product)
          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="{{ url( 'productdetail/' .$product->product_url )}}" class="product-item md-height bg-white d-block">
              <img src="{{ $product->image_path}}" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="{{ url( 'productdetail/' .$product->product_url )}}">{{ $product->product_name }}</a></h2>
            <h3 class="item-title"><a href="{{ url( 'productdetail/' .$product->product_url )}}">{{ $product->colour_name }}</a></h3>
            <strong class="item-price">IDR {{ $product->product_price }}</strong>
          </div>
          @endforeach

          {{-- <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="#" class="product-item md-height bg-gray d-block">
              <img src="images/prod_3.png" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="#">Blue Shoe High Heels</a></h2>
            <strong class="item-price"><del>$46.00</del> $28.00</strong>
          </div>

          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="#" class="product-item md-height bg-gray d-block">
              <img src="images/model_5.png" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="#">Denim Jacket</a></h2>
            <strong class="item-price"><del>$46.00</del> $28.00</strong> --}}
{{--


          </div>
          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="#" class="product-item md-height bg-gray d-block">
              <img src="images/prod_1.png" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="#">Leather Green Bag</a></h2>
            <strong class="item-price"><del>$46.00</del> $28.00</strong>
          </div>

          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="#" class="product-item md-height bg-gray d-block">
              <img src="images/model_1.png" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="#">Smooth Cloth</a></h2>
            <strong class="item-price"><del>$46.00</del> $28.00</strong>
          </div>
          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="#" class="product-item md-height bg-gray d-block">
              <img src="images/model_7.png" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="#">Yellow Jacket</a></h2>
            <strong class="item-price">$58.00</strong>
          </div> --}}

        </div>
      </div>
    </div>

  </div>

  </body>
  @endsection

</html>
