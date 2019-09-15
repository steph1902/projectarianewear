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
            <strong class="text-black">Must Haves</strong>
          </div>
        </div>
      </div>
    </div>

<div class="site-section">
  <div class="container">

    <div class="row mb-5">
      <div class="col-md-9 order-1">

        <div class="row mb-5">
          @foreach($products as $product)
          <div class="card col-md-4 item-entry mb-4">
            <a href="{{ url( 'product-detail/' .$product->product_url )}}" class="product-item md-height bg-gray d-block">
              <img src="{{ $product->image_path}}" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="#">{{ $product->product_name }}</a></h2>
            <h3 class="item-title"><a href="#">{{ $product->colour_name }}</a></h3>


            {{-- <strong class="item-price">IDR {{ number_format($product->product_price,2) }}</strong> --}}

            @if(strcmp($product->is_discount,'true') == 0 )
            <strike>
                    <strong class="text-primary h6">IDR {{ number_format($product->product_price,2) }}</strong>
            </strike>
                <strong class="text-primary h5"> IDR {{ number_format($product->price_after_discount,2) }} </strong>
            @else
                <strong class="text-primary h5">IDR {{ number_format($product->product_price,2) }}</strong>
             @endif

          </div>
          {{-- &nbsp&nbsp&nbsp --}}
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



</div>


</body>
@endsection

</html>
