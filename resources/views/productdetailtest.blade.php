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
            <a href="{{url('/')}}">Home</a>
              <span class="mx-2 mb-0">/</span>
              <a href="{{ url('productlist') }}">Shop</a> <span class="mx-2 mb-0">/</span>
              <strong class="text-black">{{ $productDetails[0]->product_name }}  - {{$productDetails[0]->colour_name}}</strong></div>
        </div>
      </div>
    </div>

    <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button>
    <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>

    <style>
        .slick-slider-image
        {
            /* height:5%; */
            margin-left: 33%;
        }
        .small-slick-image-slider
        {
            height:15%;
        }
    </style>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
                <div class="slider-for">
                    @foreach($productImages as $productImage)
                        <img class="img-fluid img-thumbnail mx-auto" src="{{ asset($productImage->image_path)  }}" alt="First slide">
                    @endforeach
                </div>

                <div class="slick-slider-image">
                    <div class="col-md-6">
                            <div class="slider-nav">
                                    @foreach($productImages as $productImage)
                                    {{-- <div class="h-25"> --}}
                                        <img class="small-slick-image-slider img-thumbnail mx-auto" src="{{ asset($productImage->image_path)  }}" alt="First slide">
                                    {{-- </div> --}}
                                    @endforeach
                            </div>
                    </div>
                </div>

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
            @if ($productDetails[0]->product_stock != 0 )
                <p><strong class="text-primary h4">Only {{ $productDetails[0]->product_stock }} left!</strong></p>
            @else
                <p><strong class="text-primary h6">Sorry, this product is currently out of stock</strong></p>

            @endif

            {{-- action('UserController@profile', ['id' => 1]); --}}
            <form method="post" action="{{ action('IndexController@addToCart',['url' => $productDetails[0]->product_url]) }}" accept-charset="UTF-8">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            @foreach($productDetails as $productDetail)

            @if ($productDetails[0]->product_stock != 0 )
                <div class="mb-1 d-flex">
                <label for="option-sm" class="d-flex mr-3 mb-3">
                    <span class="d-inline-block mr-2" style="top:-2px; position: relative;">
                    <input type="radio" id="size_name" name="size_name"></span> <span class="d-inline-block text-black">{{ $productDetail->size_name }}</span>
                </label>
                </div>
            @endif

            @endforeach

            @if ($productDetails[0]->product_stock != 0 )
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
            @endif


            @if ($productDetails[0]->product_stock != 0 )
                <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" type="submit">Add To Cart</button>
            @else
                <a href="">
                <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" type="submit">Notify me about this product!</button>
                </a>
            @endif

            </form>


          </div>
        </div>
      </div>

    </div>

{{-- <div class="col-md-3"> --}}

{{-- </div> --}}

  </div>

  <script type="text/javascript">
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            adaptiveHeight: true,
            variableWidth: true
            });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        autoplay: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
      });
    });
  </script>


</body>
@endsection
</html>
