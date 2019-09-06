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
              <a href="{{ url('product-list') }}">Shop</a> <span class="mx-2 mb-0">/</span>
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
            /* margin-left: 33%; */
            text-align: center;
        }
        .small-slick-image-slider
        {
            height:15%;
        }
        .product-image-ariane
        {
            /* height:100%; */
            /* width: 100%; */
            height: 550px;
        }
        .slider-for
        {
            margin: 3%;
            padding: 3%;
        }
        .product-info
        {
            margin: 3%;
            padding: 3%;
        }
        .slick-arrow
        {
            color: #cfecb6;
            background: #cfecb6;
        }
        .swipe-me
        {
            align-content: center;
            text-align: center;
        }
        .small-slick-image-slider
        {
            height: 100px;
        }

        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
    .tg .tg-1wig{font-weight:bold;text-align:left;vertical-align:top}
    .tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}
    .tg .tg-0lax{text-align:left;vertical-align:top}

    </style>
{{--
sm
md
lg
xl --}}

{{-- generated table --}}
{{-- <style type="text/css"> --}}
{{-- /* </style> */ --}}

{{-- generated table --}}

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
                <div class="slider-for">
                    @foreach($productImages as $productImage)
                        <img class="product-image-ariane img-fluid" src="{{ asset($productImage->image_path)  }}" alt="First slide">
                    @endforeach
                </div>

                <div class="slick-slider-image">
                            <div class="slider-nav">
                                    @foreach($productImages as $productImage)
                                        <img class="small-slick-image-slider img-thumbnail mx-auto" src="{{ asset($productImage->image_path)  }}" alt="First slide">
                                    @endforeach
                            </div>
                            <i class="swipe-me">swipe me</i>
                </div>

          </div>
          <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
          <div class="product-info">



          {{-- kanan start --}}
          <h2 class="text-black">
              {{ $productDetails[0]->product_name }}  - {{$productDetails[0]->colour_name}}
          </h2> {{-- name --}}

            <p> {{ $productDetails[0]->product_description }} </p>

            <h4 class="text-black">Wash Instruction</h4>
            <p class="mb-4">
              {{ $productDetails[0]->product_wash_instruction }}
            </p>

            <p><strong class="text-primary h4">IDR {{ number_format($productDetails[0]->product_price,2) }}</strong></p>
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
                <div class="custom-control custom-radio">
                    <input type="radio" id="{{$productDetail->size_name}}" name="size_name" class="custom-control-input" value="{{$productDetail->size_name}}">
                    <label class="custom-control-label" for="{{$productDetail->size_name}}">{{ $productDetail->size_name }}</label>
                </div>
                <br>
            @endif

            @endforeach



            {{-- size chart table --}}
            @if($productDetail->size_name != 'ALL SIZE')
            <div class="size-chart table-responsive">
                <table class="tg">
                    <tr>
                      <th class="tg-1wig">Ladies Size Chart</th>
                      <th class="tg-amwm">Height</th>
                      <th class="tg-amwm">Chest</th>
                      <th class="tg-amwm">Waist</th>
                    </tr>
                    <tr>
                      <td class="tg-amwm">S</td>
                      <td class="tg-0lax">157-163</td>
                      <td class="tg-0lax">79-87</td>
                      <td class="tg-0lax">60-68</td>
                    </tr>
                    <tr>
                      <td class="tg-amwm">M</td>
                      <td class="tg-0lax">162-168</td>
                      <td class="tg-0lax">82-90</td>
                      <td class="tg-0lax">63-71</td>
                    </tr>
                    <tr>
                      <td class="tg-amwm">L</td>
                      <td class="tg-0lax">167-173</td>
                      <td class="tg-0lax">85-93</td>
                      <td class="tg-0lax">66-74</td>
                    </tr>
                  </table>
            </div>
            @endif
            {{-- chart table --}}
            <br><br>





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

            {{-- kanan end --}}


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
            arrows: true,
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
