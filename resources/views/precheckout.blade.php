@extends('layouts.app')

@section('content')
<body>



  <div class="site-wrap">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
          <a href="{{url('/')}}">Home</a> <span class="mx-2 mb-0">/</span>
            <a href="{{url('cart')}}">Cart</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Pre - Checkout</strong></div>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">


          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Billing Details</h2>
              <div class="p-3 p-lg-5 border">
                    {{-- 'toPayment','IndexController@toPayment' --}}
            <form method="post" action="{{ action('IndexController@toPayment') }}" accept-charset="UTF-8">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                  <div class="form-group row">

                    <div class="col-md-6">
                      <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="lastname" name="lastname">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Street address">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Provinces <span class="text-danger">*</span></label>
                    <select id="province" name="province" class="form-control">
                      <option value="0" disable="true" selected="true">Select a province</option>
                      {{-- looping province start here --}}
                      @foreach ($provinces as $province)
                      <option value="{{ $province['province_id'] }}">
                        {{ $province['province'] }}
                      </option>
                      @endforeach
                      {{-- looping province end here --}}

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Cities <span class="text-danger">*</span></label>
                    <select id="city" name="city" class="form-control">
                      <option value="0" disable="true" selected="true">Select a city</option>
                      <option value=""></option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Postal / Zip Code<span class="text-danger">*</span></label>
                    <select id="postal_code" name="postal_code" class="form-control">

                      <option value=""></option>
                    </select>
                  </div>

                  <div class="form-group row mb-5">
                    <div class="col-md-6">
                      <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="c_order_notes" class="text-black">Order Notes</label>
                    <textarea name="notes" id="notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                  </div>

                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Shipping Courier<span class="text-danger">*</span></label>
                    <select id="courier" name="courier" class="form-control">
                      <option value="jne" disable="true" selected="true">JNE</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Services<span class="text-danger">*</span></label>
                    <select id="delivery" name="delivery" class="form-control">
                      <option value="REG" disable="true" selected="true">REG</option>
                      <option value="OKE" disable="true">OKE</option>
                      {{-- <option value="yes" disable="true">YES</option> --}}
                      {{-- <option value="sps" disable="true">SPS</option> --}}
                    </select>
                  </div>
                </div>
            </div>

            <div class="col-md-6">

              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                  <div class="p-3 p-lg-5 border">

                    <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                    <div class="input-group w-75">
                      <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary btn-sm px-4" type="button" id="button-addon2">Apply</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <?php $total = 0 ?>
              @if(session('cart'))

              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Your Order</h2>
                  <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                      <thead>
                        <th>Product</th>
                        <th>Total</th>
                      </thead>
                      <tbody>
                        @foreach(session('cart') as $url => $details)
                        <?php $total += $details['product_price'] * $details['product_quantity'] ?>

                        <tr>
                          <td>{{ $details['product_name'] }} <strong class="mx-2">x</strong> {{$details['product_quantity']}} </td>
                          <td>IDR {{ $details['product_price'] * $details['product_quantity'] }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                    @endif
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed to Payment</button>
                    </form>
                    </div>
                </div> {{-- thisone --}}

              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- </form> -->
    </div>
  </div>




</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $('#province').on('change', function(e)
    {
        console.log(e);
        var province_id = e.target.value;

        $.get('/getcities?province_id=' + province_id, function(data)
        {
            console.log(data);
            $('#city').empty();
            $('#postal_code').empty();
            $('#city').append('<option value="0" disable="true" selected="true">Select a city</option>');


           
            $.each(data, function(index,cityObj)
            {
                $('#city').append('<option value="'+ cityObj.city_id +'">'+ cityObj.city_name +'</option>');
            });
          });
    });

    $('#city').on('change', function(e)
    {
        console.log(e);
        var city_id = e.target.value;
        $.get('/getpostalcode?city_id=' + city_id,function(data)
        {
            console.log(data);

            $.each(data, function(index, postalCodeObj)
            {
                console.log(postalCodeObj.postal_code);
                $('#postal_code').append('<option value="'+ postalCodeObj.postal_code +'">'+ postalCodeObj.postal_code    +'</option>');

            });
        });

        $.get('/getshippingcost',function(data)
        {
            console.log(data);
            // console.log(data);
            // var obj = JSON.parse(data);
            // console.log('---');
            // result cost value
            // console.log(data['rajaongkir']['results']['costs']['cost'].value);

        });
    });
</script>
</body>
@endsection
</html>
