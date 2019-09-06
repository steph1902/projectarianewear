@extends('layouts.app')

@section('content')
<body>

  <div class="site-wrap">

    @if(session('success'))

    <div class="alert alert-success">
      {{ session('success') }}
    </div>

    @endif

    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="{{url('/')}}">Home</a>
            <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Shop</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          {{-- <div class="col-md-9 order-1"> --}}


            <div class="row">
              @foreach($products as $product)
              <div class="card col-md-3 item-entry mb-3">
                <a href="{{ url( 'product-detail/' .$product->product_url )}}" class="product-item md-height bg-gray d-block">
                  <img src="{{ $product->image_path}}" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="#">{{ $product->product_name }}</a></h2>
                <h3 class="item-title"><a href="#">{{ $product->colour_name }}</a></h3>

                {{-- calculate discount --}}

                <?php $discount = $product->discount_percentage ?>
                <?php $discountNominal = $discount / 100 * $product->product_price  ?>
                <?php $priceAfterDiscount = $product->product_price - $discountNominal ?>

                {{-- calculate discount --}}
                <span class="item-price">
                    <strike>  IDR {{ number_format($product->product_price,2) }} </strike>
                <span>
                <br>
                <strong class="item-price">
                    <h5 class="discount-price"> IDR {{ number_format($priceAfterDiscount,2) }} </h5>
                </strong>

                {{-- <form method="post" action="{{ action('IndexController@addToCart',['url' => $productDetails[0]->product_url]) }}" accept-charset="UTF-8"> --}}
                {{-- @csrf --}}
                    <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" type="submit">Add To Cart</button>
                {{-- </form> --}}

            </div>
              @endforeach

            </div>

            {{-- 3 product view row style --}}




            <div class="row" >
              <div class="col-md-12 text-center">
                <div class="site-block-27 text-center">

                  {{ $products->links() }}

                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>



  </div>


</body>
@endsection

</html>