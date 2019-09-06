@extends('layouts.app')

@section('content')
<body>

<style>
  #myModal
  {
    margin-top:7%;
    width: auto;
  }
  .ariane
  {
    font-family: "Arial Narrow", Arial, sans-serif;
    font-size: 16px;
    font-style: normal;
    font-variant: normal;
    font-weight: 700;
    line-height: 16px;
   }
</style>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">

                        <div class="logo">
                                {{-- <div class="site-logo"> --}}
                                  <a href="{{url('/')}}" class="js-logo-clone">
                                      <img src="{{asset('images/logoariane.jpg')}}" height="75" width="180"/>
                                  </a>
                                {{-- </div> --}}
                              </div>


                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">

                        <div class="container">

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="image">
                                        <img src="{{asset('images/Foto Produk Ariane Wear/Clara Outer/White/CLARA OUTER (1).jpg')}}" alt="Image" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h6><i>Sign Up for Our Newsletters</i></h6>
                                    <p class="ariane">Ariane Daily - Celebrity style, beauty tips, culture news and more</p>

                                    <form method="post" action="{{url('newsletter')}}">
                                        @csrf
                                      <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>


                                      <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
                                    </div>
                                    </form>

                                    @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <p>{{ \Session::get('success') }}</p>
                                    </div><br />
                                    @endif
                                    @if (\Session::has('failure'))
                                    <div class="alert alert-danger">
                                        <p>{{ \Session::get('failure') }}</p>
                                    </div><br />
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- modal --}}

  <div class="site-wrap">
    <div class="site-blocks-cover" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2019</h2>
            <h1>Arrivals Sales</h1>
            <p><a href="{{url('product-list')}}" class="btn btn-black rounded-0">Shop Now</a></p>
            </div>
          </div>
          <div class="col-md-6 order-1 align-self-end">
            <img src="{{asset('images/Foto Produk Ariane Wear/Indy Outer/Army Green/INDY OUTER (6).jpg')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="title-section mb-5">
          <h2 class="text-uppercase"><span class="d-block">Discover</span> The Collections</h2>
        </div>
        <div class="row align-items-stretch">
          <div class="col-lg-8">
            <div class="product-item sm-height full-height bg-gray">
              <a href="{{url('top')}}" class="product-category">Top</a>
              <img src="{{asset('images/Foto Produk Ariane Wear/Alexa Top/Black/ALEXA TOP.jpeg')}}" alt="Image" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-4">
            <div class="product-item sm-height bg-gray mb-4">
              <a href="{{url('outer')}}" class="product-category">Outerwear </a>
              <img src="{{asset('images/Foto Produk Ariane Wear/Clara Outer/White/CLARA OUTER (1).jpg')}}" alt="Image" class="img-fluid">
            </div>
            {{-- C:\Users\User\Documents\laravelproject\projectariane\public\images\Foto Produk Ariane Wear\ --}}
            <div class="product-item sm-height bg-gray">
              <a href="{{url('jumpsuit')}}" class="product-category">Jumpsuit</a>
              <img src="{{asset('images/Foto Produk Ariane Wear/Kylie Jumpsuit/Nude/KYLIE JUMPSUIT (2).jpeg')}}" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>




    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section mb-5 col-12">
            <h2 class="text-uppercase">Popular Products</h2>
          </div>
        </div>
        <div class="row">
            @foreach($products as $product)
          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="{{ url( 'product-detail/' .$product->product_url )}}" class="product-item md-height bg-white d-block">
              <img src="{{ $product->image_path}}" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="{{ url( 'product-detail/' .$product->product_url )}}">{{ $product->product_name }}</a></h2>
            <h3 class="item-title"><a href="{{ url( 'product-detail/' .$product->product_url )}}">{{ $product->colour_name }}</a></h3>
            <strong class="item-price">IDR {{ number_format($product->product_price,2) }}</strong>
          </div>
          @endforeach


        </div>
      </div>
    </div>

  </div>

  <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>

  </body>
  @endsection

</html>
