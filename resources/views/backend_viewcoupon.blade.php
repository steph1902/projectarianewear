<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ariane Wear Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{ url('ariane-admin-backend-sitemap') }}">Ariane Wear Dashboard</a>


  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    {{-- <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Products</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Product Management</h6>
          <a class="dropdown-item" href="#">Add Product</a>
          <a class="dropdown-item" href="#">Edit Product</a>
          <a class="dropdown-item" href="#">Delete Product</a>

          <!-- <a class="dropdown-item" href="blank.html">Blank Page</a> -->
          <div class="dropdown-divider"></div>

          <h6 class="dropdown-header">Discount</h6>
          <a class="dropdown-item" href="#">Add Discount</a>
          <a class="dropdown-item" href="#">Edit Discount</a>
          <a class="dropdown-item" href="#">Delete Discount</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Customers</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Customer Management</h6>
          <a class="dropdown-item" href="#">Customer Information</a>
          <!-- <a class="dropdown-item" href="#"></a> -->

        </div>
      </li>

      </ul> --}}

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('ariane-admin-backend-sitemap') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">View Product</li>
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
          {{-- 'products.product_name',
          'products.product_price',
          'products.product_material',
          'products.product_description',
          'products.wash_instruction',
          'products.product_stock',
          'products.product_weight',
          'colour.colour_name') --}}
{{--
          id
coupon_code
coupon_expiry
coupon_discount_value
created_at
updated_at --}}
          <table class="table">
                <th>ID</th>
                <th>Coupon Code</th>
                <th>Coupon Expiry</th>
                <th>Coupon Discount Value</th>
                <th>Created_At</th>
                <th>Updated_At</th>
                <th>Edit</th>
                <th>Delete</th>
                @foreach($coupons as $coupon)
                <tr>
                    <td>{{$coupon->id}}</td>
                    <td>{{$coupon->coupon_code}}</td>
                    <td>{{$coupon->coupon_expiry}}</td>
                    <td>{{$coupon->coupon_discount_value}} %</td>
                    <td>{{$coupon->created_at}}</td>
                    <td>{{$coupon->updated_at}}</td>
                    <td>
                    <a href="{{ url('ariane-admin-backend-edit-coupon-view/'.$coupon->id) }}">
                        Edit
                    </a>

                    {{-- <a href="{{ url('ariane-admin-backend-edit-product-view/' .$product->product_url) }}"> --}}
                        {{-- {{$product->product_url}} --}}
                    {{-- </a> --}}
                    </td>
                    <td>
                            <a href="{{ url('ariane-admin-backend-delete-coupon/'.$coupon->id) }}">
                                Delete
                            </a>
                    </td>
                </tr>
                @endforeach
          </table>



<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © ARIANE WEAR PROJECT 2019</span>
    </div>
  </div>
</footer>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
