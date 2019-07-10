@extends('layouts.app')

@section('content')
<body>



  <div class="site-wrap">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span>
            <a href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Checkout</strong></div>
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
                      <input type="text" class="form-control" id="c_diff_fname" name="firstname">
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_lname" name="lastname">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_address" name="address" placeholder="Street address">
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
                      {{-- <option value="0" disable="true" selected="true">Select a city</option> --}}
                      <option value=""></option>
                    </select>
                  </div>
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
                      <input type="text" class="form-control" id="c_diff_email_address" name="email">
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_phone" name="phone" placeholder="Phone Number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="c_order_notes" class="text-black">Order Notes</label>
                    <textarea name="notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
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
                        <tr>

                        </tr>

                        <tr>
                          <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                          <td class="text-black font-weight-bold"><strong>IDR {{ $total }}</strong></td>
                        <input type="hidden" id="totalprice" name="totalprice" value="{{$total}}">
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
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
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
    // $('#postal_code').empty();
    $.each(data, function(index, postalCodeObj)
    {
      console.log(postalCodeObj.postal_code);
    //   $('#postal_code').val(postalCodeObj.postal_code);
      $('#postal_code').append('<option value="'+ postalCodeObj.postal_code +'">'+ postalCodeObj.postal_code    +'</option>');
    //   document.getElementById('postal_code').value = postalCodeObj.postal_code;
    });
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
        customer_name: $('input#firstname').val(),
        customer_email: $('input#email').val(),
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
