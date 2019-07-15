@extends('layouts.backendapp')

@section('content')
      <div id="content-wrapper">
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Product</li>
          </ol>

          <!-- Icon Cards-->
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div><br />
            @endif
          </div>

          @foreach($productDetails as $details)

          <form method="POST" action="{{ route('backendeditproduct')}}">
            @csrf
            <div class="form-group">
              <label for="product_name">Product Name</label>
              <input type="text" name="product_name" class="form-control" id="" aria-describedby="emailHelp" placeholder="{{$details->product_name}}">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
              <label for="product_price">Product Price</label>
            <input type="number" name="product_price" class="form-control" id="" placeholder="{{$details->product_price}}">
            </div>

            <div class="form-group">
              <label for="product_price">Product Stock</label>
              <input type="number" name="product_stock" class="form-control" id="" placeholder="{{$details->product_stock}}">
            </div>


            <div class="form-group">
              <label for="product_size_in_cm">Product size (in CM)</label>
              <input type="text" name="product_size_in_cm" class="form-control" placeholder="{{$details->product_size_in_cm}}">
            </div>

            <div class="form-group">
              <label for="product_material">Product Material</label>
              <input type="text" name="product_material" class="form-control" placeholder="{{$details->product_material}}">
            </div>

            <div class="form-group">
              <label for="product_material">Product Colour</label>
              <input type="text" name="product_colour" class="form-control" placeholder="{{$details->colour_name}}">
            </div>

            <div class="form-group">
              <label for="product_description">Product Description</label>
              <textarea class="form-control" name="product_description" placeholder="{{$details->product_description}}" rows="3"></textarea>
            </div>

            <div class="form-group">
              <label for="product_wash_instruction">Product Wash Instruction</label>
              <textarea class="form-control" name="product_wash_instruction" placeholder="{{$details->product_wash_instruction}}" rows="3"></textarea>
            </div>
            <!-- custom-control custom-checkbox -->

            <div class="form-group">
              {{-- <label for="product_wash_instruction">Product Size</label> --}}

              {{-- <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="product_size_s" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">S</label>
              </div>

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="product_size_m" id="customCheck2">
                <label class="custom-control-label" for="customCheck2">M</label>
              </div>

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="product_size_l" id="customCheck3">
                <label class="custom-control-label" for="customCheck3">L</label>
              </div>

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="product_size_allsize" id="customCheck4">
                <label class="custom-control-label" for="customCheck4">All Size</label>
              </div> --}}

              @endforeach

              <!-- <div class="divider"></div> -->
              <br>
              {{-- <div class="form-group">
                    <label for="product_size_in_cm">Product Images</label>
                    <input type="text" name="product_url" class="form-control" value="images\Foto Produk Ariane Wear\{Nama Produk}\{Warna Produk}\{gambar.jpg}">
            </div> --}}


            </div>
            <!-- <div class="form-group"> -->

              <button type="submit" class="text-center btn btn-primary">Submit</button>
            </div>

        </form>


  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->





{{--

<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © ARIANE WEAR PROJECT 2019</span>
    </div>
  </div>
</footer> --}}

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
@endsection

</html>
