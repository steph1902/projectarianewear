@extends('layouts.app')

@section('content')

@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

  <body>

  <div class="site-wrap">

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>
{{--  "product_name" => $productDetails[0]->product_name,
                    "product_quantity" => 1,
                    "product_price" => $productDetails[0]->product_price,
                    "product_image" => $productDetails[0]->image_path,
                    "product_size" => $productDetails[0]->size_name,
                    "product_colour" => $productDetails[0]->colour_name, --}}
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail"> Image</th>
                    <th class="product-name"> Name</th>
                    <th class="product-colour"> Colour</th>
                    <th class="product-size"> Size</th>
                    <th class="product-price"> Price</th>
                    <th class="product-quantity"> Quantity</th>
                    <th class="product-subtotal"> Subtotal</th>
                    <th class="product-remove">Remove Item</th>
                  </tr>
                </thead>

                <?php $total = 0 ?>
                <tbody>



                @if(session('cart'))
                  @foreach(session('cart') as $url => $details)

                  <?php $total += $details['product_price'] * $details['product_quantity'] ?>

                  <tr>
                    <td class="product-thumbnail">
                      <img src="{{$details['product_image']}}" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{ $details['product_name'] }}</h2>
                    </td>
                    <td class="product-name">
                        <h2 class="h5 text-black">{{ $details['product_colour'] }}</h2>
                    </td>
                    <td class="product-name">
                            <h2 class="h5 text-black">{{ $details['product_size'] }}</h2>
                        </td>
                    <td>IDR {{ $details['product_price'] }}</td>
                    <td class="product-name">
                        <h2 class="h5 text-black">{{ $details['product_quantity'] }}</h2>
                    </td>
                    <td>IDR {{ $details['product_price'] * $details['product_quantity'] }}</td>
                    <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                  </tr>

                    @endforeach
                  @endif

                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm px-4">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">IDR {{ $total }}</strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">IDR {{ $total }}</strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                  <a href="{{url('checkout')}}">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">Proceed To Checkout</button>
                  </a>
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
