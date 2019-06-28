@extends('layouts.app')

@section('content')
<body>

  <div class="site-wrap">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
              <a href="">Home</a> <span class="mx-2 mb-0">/</span>
              <a href="{{ url('productlist') }}">Shop</a> <span class="mx-2 mb-0">/</span>
              <strong class="text-black">{{ $productDetails[0]->product_name }}  - {{$productDetails[0]->colour_name}}</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">


            <!-- BOOTSTRAP START -->
            <div class="item-entry">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
<!--                   <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="11"></li> -->
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <!-- <img class="d-block w-100 img-fluid" src="images/prod_2.png" alt="First slide"> -->
                    {{-- <img src="{{asset('images/Foto Produk Ariane Wear/Indy Outer/Army Green/INDY OUTER (6).jpg')}}" alt="Image" class="img-fluid"> --}}
                    {{-- src="images\Foto Produk Ariane Wear\Indy Outer\Army Green\INDY OUTER (6).jpg" --}}
                    <img class="img-fluid img-thumbnail mx-auto" src="{{ asset($productDetails[0]->image_path)  }}" alt="First slide">
                  </div>
                  {{-- <div class="carousel-item">
                    <!-- <img class="d-block w-100 img-fluid" src="images/prod_2.png" alt="Second slide"> -->
                    <img class="img-fluid img-thumbnail mx-auto" src="images/prod_2.png" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <!-- <img class="d-block w-100 img-fluid" src="images/prod_2.png" alt="Third slide"> -->
                    <img class="img-fluid img-thumbnail mx-auto" src="images/prod_2.png" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <!-- <img class="d-block w-100 img-fluid" src="images/prod_2.png" alt="Third slide"> -->
                    <img class="img-fluid img-thumbnail mx-auto" src="images/prod_2.png" alt="Fourth slide">
                  </div> --}}
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <!-- BOOTSTRAP END -->

          </div>
          <div class="col-md-6">

          <h2 class="text-black"> {{ $productDetails[0]->product_name }}  - {{$productDetails[0]->colour_name}}</h2> {{-- name --}}


            {{-- <h3 class="text-black">  </h3> colour --}}

            <p> {{ $productDetails[0]->product_description }} </p>

            <h4 class="text-black">Wash Instruction</h4>

            <p class="mb-4">
              {{ $productDetails[0]->product_wash_instruction }}
            </p>

            <p><strong class="text-primary h4">IDR {{ $productDetails[0]->product_price }}</strong></p>
            {{-- action('UserController@profile', ['id' => 1]); --}}
            <form method="post" action="{{ action('IndexController@addToCart',['url' => $productDetails[0]->product_url]) }}" accept-charset="UTF-8">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>



            @foreach($productDetails as $productDetail)


            <div class="mb-1 d-flex">
              <label for="option-sm" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;">
                <input type="radio" id="option-sm" name="size_name"></span> <span class="d-inline-block text-black">{{ $productDetail->size_name }}</span>
              </label>
            </div>

            @endforeach

            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" name="quantity" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>

            </div>

            {{-- <p><a href=" {{ url( 'addtocart/' .$productDetails[0]->product_url )}}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a></p> --}}
            <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" type="submit">Add To Cart</button>


            </form>


          </div>
        </div>
      </div>
    </div>

  </div>
</body>
@endsection
</html>
