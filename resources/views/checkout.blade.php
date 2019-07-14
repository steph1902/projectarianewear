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
            <strong class="text-black">Complete Payment</strong></div>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12">
              <div class="border p-4 rounded" role="alert">
                Returning customer? <a href="{{url('login')}}">Click here</a> to login
              </div>
            </div>
          </div>

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

                <form onsubmit="return submitForm();">

                  @csrf

                  <div class="form-group row">



                    <div class="col-md-6">
                      <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{session()->get('first_name')}}" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="lastname" name="lastname" value="{{session()->get('last_name')}}" disabled>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="address" name="address" value="{{session()->get('address')}}" disabled>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Provinces <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" value="{{session()->get('province')}}" disabled>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Cities <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="{{session()->get('city')}}" disabled>
                    {{-- <select id="city" name="city" class="form-control">
                      <option value="0" disable="true" selected="true">Select a city</option>
                      <option value=""></option>
                    </select> --}}
                  </div>

                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Postal / Zip Code<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="{{session()->get('postal_code')}}" disabled>
                    {{-- <select id="postal_code" name="postal_code" class="form-control"> --}}
                      {{-- <option value="0" disable="true" selected="true">Select a city</option> --}}
                      {{-- <option value=""></option> --}}
                    </select>
                  </div>

                  {{-- {{ session()->put('total_weight',$weight) }}
                  {{ session()->put('total_price',$total) }} --}}

                  {{-- <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Calculate Shipping</button>
                  </div> --}}

{{--
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_diff_postal_zip" class="text-black">Postal / Zip Code<span class="text-danger">*</span></label>
                      <input disabled type="text" class="form-control" id="postal_code" name="postal_code">
                    </div>
                  </div> --}}


                  <div class="form-group row mb-5">
                    <div class="col-md-6">
                      <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="address" name="address" value="{{session()->get('email')}}" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="address" name="address" value="{{session()->get('phone')}}" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="c_order_notes" class="text-black">Order Notes</label>
                    <textarea name="notes" id="notes" cols="30" rows="5" class="form-control" value="{{session()->get('notes')}}" disabled></textarea>
                  </div>

                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Shipping Courier<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="JNE" disabled>
                    {{-- <select id="courier" name="courier" class="form-control"> --}}
                      {{-- <option value="jne" disable="true" selected="true">JNE</option> --}}
                    {{-- </select> --}}
                  </div>

                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">Services<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="{{session()->get('delivery')}}" disabled>
                    {{-- <select id="delivery" name="delivery" class="form-control">
                      <option value="reg" disable="true" selected="true">REG</option>
                      <option value="oke" disable="true">OKE</option>
                      <option value="yes" disable="true">YES</option>
                      <option value="sps" disable="true">SPS</option>
                    </select> --}}
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
              <?php $shippingcost = session()->get('shipping_cost') ?>
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
                        <tr>

                        </tr>

                        <tr>
                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                            <td class="text-black font-weight-bold"><strong>IDR {{ $total }}</strong></td>
                            <input type="hidden" id="totalprice" name="totalprice" value="{{$total}}">
                        </tr>

                        <tr>
                            <td class="text-black font-weight-bold"><strong>Shipping Cost</strong></td>
                            <td class="text-black font-weight-bold"><strong>IDR {{$shippingcost}} <p id="shippingcost">   </p></strong></td>
                        </tr>
                        <?php $grandtotal = 0 ?>
                        <?php $grandtotal = $total + $shippingcost ?>
                        <tr>
                            <td class="text-black font-weight-bold"><strong>Grand Total</strong></td>
                            <td class="text-black font-weight-bold"><strong>IDR {{ $grandtotal }}</strong></td>
                            {{-- <input type="hidden" id="grandtotal" name="grandtotal" value="{{$grandtotal}}"> --}}
                            <input type="hidden" id="totalprice" name="totalprice" value="{{$grandtotal}}">
                            {{ session()->put('total_price',$grandtotal) }}

                        </tr>


                      </tbody>
                    </table>

                    @endif


                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block"
                        data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false"
                         aria-controls="collapsebank">Midtrans Payment Gateway</a></h3>

                      <div class="collapse" id="collapsebank">
                        <div class="py-2">
                          <p class="mb-0">
                              Make your payment directly into our bank account.
                              Please use your Order ID as the payment reference.
                              Your order won’t be shipped until the funds have cleared in our account.</p>
                              <p class="mb-0"><br><strong>Empowering commerce
                                    through technology</strong><br>
                                    Midtrans sudah membantu ribuan bisnis di Indonesia dengan sistem pembayaran online yang aman dan nyaman.</p>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      {{-- <input type="submit" class="btn btn-primary btn-lg btn-block" value="Place Order"/>
                       --}}
                       <button type="submit" class="btn btn-primary btn-lg btn-block">Place Order</button>
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


<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script src="{{ !config('services.midtrans.isProduction')
            ? 'https://app.sandbox.midtrans.com/snap/snap.js'
            : 'https://app.midtrans.com/snap/snap.js' }}"
            data-client-key="{{ config('services.midtrans.clientKey') }}">
</script>
<script>
function submitForm()
{
    $.post("{{ route('orderdetails') }}",
    {
        _method: 'POST',
        _token: '{{ csrf_token() }}',
        totalprice: $('input#totalprice').val(),
        note: $('textarea#note').val(),
        // firstname: $('input#firstname').val(),
        // customer_email: $('input#email').val(),
        firstname: $('input#firstname').val(),
        lastname: $('input#lastname').val(),
        address: $('input#address').val(),
        province: $('select#province').val(),
        city: $('select#city').val(),
        postal_code: $('select#postal_code').val(),
        email: $('input#email').val(),
        phone: $('input#phone').val(),
        // order_id: => $orderId,
        // total_weight: => $totalWeight,
        // total_price: => $totalPrice

    },
function (data, status) {
    snap.pay(data.snap_token, {
        // Optional
        onSuccess: function (result) {
            location.reload();
        },
        // Optional
        onPending: function (result) {
            location.reload();
        },
        // Optional
        onError: function (result) {
            location.reload();
        }
    });
});
return false;
}
</script>


</body>
@endsection
</html>
