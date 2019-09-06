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
      <div class="col-md-9 order-1">

        <div class="row mb-5">
          @foreach($products as $product)
          <div class="card col-md-4 item-entry mb-4">
            <a href="{{ url( 'product-detail/' .$product->product_url )}}" class="product-item md-height bg-gray d-block">
              <img src="{{ $product->image_path}}" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="#">{{ $product->product_name }}</a></h2>
            <h3 class="item-title"><a href="#">{{ $product->colour_name }}</a></h3>
            <strong class="item-price">IDR {{ number_format($product->product_price,2) }}</strong>
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


          <div class="border p-4 rounded mb-4">
            {{-- <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div> --}}
{{--
            ALL
UNDER IDR 500K
IDR 500K - IDR 1M --}}
            <form method="POST">
            <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <label for="s_sm" class="d-flex">
                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">ALL</span>
                </label>
                <label for="s_md" class="d-flex">
                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">UNDER IDR 500K</span>
                </label>
                <label for="s_lg" class="d-flex">
                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">IDR 500K - IDR 1M</span>
                </label>
                {{-- <label for="s_lg" class="d-flex">
                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">All Size</span>
                </label> --}}
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Size</h3>
              <label for="s_sm" class="d-flex">
                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small</span>
              </label>
              <label for="s_md" class="d-flex">
                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium</span>
              </label>
              <label for="s_lg" class="d-flex">
                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large</span>
              </label>
              <label for="s_lg" class="d-flex">
                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">All Size</span>
              </label>
            </div>

            <div class="mb-4">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Apply Filter</button>
            </div>
        </form>

          </div>
        </div>
      </div>

    </div>
  </div>



</div>


</body>
@endsection

</html>
