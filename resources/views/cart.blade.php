@extends('layouts.app')

@section('content')


  <body>

  <div class="site-wrap">

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
                <a href="{{url('/')}}">Home</a>
            <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

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
                    <th class="product-size"> Weight(gr)</th>
                    <th class="product-price"> Price</th>
                    <th class="product-quantity"> Quantity</th>
                    <th class="product-subtotal"> Subtotal</th>
                    <th class="product-remove">Remove Item</th>
                  </tr>
                </thead>

                <?php $total = 0 ?>
                <?php $weight = 0 ?>

                <tbody>



                @if(session('cart'))
                  @foreach(session('cart') as $url => $details)

                  <?php $total += $details['product_price'] * $details['product_quantity'] ?>
                  <?php $weight += $details['product_weight'] * $details['product_quantity'] ?>

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
                    <td class="product-name">
                            <h2 class="h5 text-black">{{ $details['product_weight'] }}</h2>
                    </td>
                    <td>IDR {{ $details['product_price'] }}</td>
                    <td class="product-name">
                        <h2 class="h5 text-black">{{ $details['product_quantity'] }}</h2>
                    </td>
                    <td>IDR {{ $details['product_price'] * $details['product_quantity'] }}</td>

                    {{-- <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button> --}}
                    {{-- <form method="post" action="{{ action('IndexController@addToCart',['url' => $productDetails[0]->product_url]) }}" accept-charset="UTF-8"> --}}
                    <td>

                        <button class="btn btn-primary height-auto btn-sm remove-from-cart" data-id="{{ $url }}">
                            X
                        </button>

                        {{-- <a href="{{url('removeCart')}}" class="btn btn-primary height-auto btn-sm">
                            X
                        </a> --}}
                    </td>
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
              {{-- <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
              </div> --}}
              <div class="col-md-6">
              <a href="{{url('productlist')}}">
                <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
              </a>
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
                        <span class="text-black">Total Weight</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black">{{ $weight }}gr</strong>
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

                {{ session()->put('total_weight',$weight) }}
                {{ session()->put('total_price',$total) }}





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



  <script type="text/javascript">



    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure"))
        {
            $.ajax({
                url: '{{ url('removecart') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', url: ele.attr("data-id")},
                success: function (response)
                {
                    // console.log(response);
                    // console.log(data);
                    window.location.reload();
                }
            });
        }
    });

</script>


  </body>
  @endsection
</html>
