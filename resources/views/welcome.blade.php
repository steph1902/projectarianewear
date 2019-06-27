@extends('layouts.app')

@section('content')
<body>

  <div class="site-wrap">
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


        </div>
      </div>
    </div>

  </div>

  </body>
  @endsection

</html>
