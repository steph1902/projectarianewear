@extends('layouts.app')

@section('content')
<body>
        <meta name="csrf-token" content="{{ csrf_token() }}">


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
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
                <form>
                @csrf

                    <div class="form-group row">

                            <div class="col-md-6">
                            <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                            </div>
                            <div class="col-md-6">
                            <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
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

                          <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_diff_postal_zip" class="text-black">Postal / Zip Code<span class="text-danger">*</span></label>
                                <input disabled type="text" class="form-control" id="postal_code" name="postal_code" value="">
                            </div>
                          </div>


                        <div class="form-group row mb-5">
                          <div class="col-md-6">
                            <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                          </div>
                          <div class="col-md-6">
                            <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
                          </div>
                        </div>

                        <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                        </div>

                    </div>
                </form>



              {{-- <div class="form-group">
                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account">
                    <input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Account Password</label>
                      <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                    </div>
                  </div>
                </div>
              </div> --}}


              {{-- <div class="form-group">
                <label for="c_ship_different_address" class="text-black" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false"
                aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Ship To A Different Address?</label>
                <div class="collapse" id="ship_different_address">
                  <div class="py-2">


                        {{-- nama depan* 	nama belakang*
                        Alamat*
                        Provinsi*	Kota*
                        Kode Pos*
                        Nomor Handphone*
                        E-mail* --> check email exists disini?
                        Password*

                        Catatan Tambahan
 --}}
                  {{-- </div> --}}

                {{-- </div> --}}
              {{-- </div> --}}




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
                          </tr>
                        </tbody>
                      </table>

                            @endif


                      <div class="border p-3 mb-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                        <div class="collapse" id="collapsebank">
                          <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          </div>
                        </div>
                      </div>

                      {{-- <div class="border p-3 mb-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                        <div class="collapse" id="collapsecheque">
                          <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          </div>
                        </div>
                      </div>

                      <div class="border p-3 mb-5">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                        <div class="collapse" id="collapsepaypal">
                          <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          </div>
                        </div>
                      </div> --}}

                      <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block" onclick="window.location='thankyou.html'">Place Order</button>
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
                $('#postal_code').empty();
                $.each(data, function(index, postalCodeObj)
                {
                    console.log(postalCodeObj.postal_code);
                    $('#postal_code').val(postalCodeObj.postal_code);
                });
        });
      });

      $('#postal_code').on('change',function(e)
      {

      });
    </script>


  </body>
  @endsection
</html>
