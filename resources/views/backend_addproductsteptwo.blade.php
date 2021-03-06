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

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Ariane Wear Dashboard</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>



  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
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
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
        </li> -->
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Product</li>
          </ol>

          <p class="main">Step 2 of 4 - Add Product Colour Information</p>

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

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

          </div>

          {{-- colour_name
          product_name
          product_url
          created_at
          updated_at --}}
          <form method="post" action=" {{action('BackendController@')}} ">
            @csrf
            <div class="form-group">
              <label for="product_name">Colour Name</label>
              <input type="text" name="colour_name" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter product name">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
              <label for="product_price">Product Price</label>
              <input type="number" name="product_price" class="form-control" id="" placeholder="IDR ..">
            </div>

            <div class="form-group">
                <label for="product_size_in_cm">Product size (in CM)</label>
                <input type="text" name="product_size_in_cm" class="form-control" placeholder="Bust X Length X Waist (*CM)">
            </div>

            <div class="form-group">
                <label for="product_material">Product Material</label>
                <input type="text" name="product_material" class="form-control" placeholder="Jersey.. Satten..">
              </div>


            <div class="form-group">
                <label for="product_wash_instruction">Product Description</label>
                <textarea class="form-control" name="product_description" placeholder="The best dress ever ..." rows="3"></textarea>
              </div>


            <div class="form-group">
                <label for="product_wash_instruction">Product Wash Instruction</label>
                <textarea class="form-control" name="product_wash_instruction" placeholder="Hand wash cold separately ..." rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="product_special_category">Product Special Category</label>
                <div class="form-check">
                    <input name="special_category[]" class="form-check-input" type="checkbox" value="new_arrival" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      New Arrival
                    </label>
                  </div>

                  <div class="form-check">
                    <input name="special_category[]" class="form-check-input" type="checkbox" value="best_seller" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Best Seller
                    </label>
                  </div>

                  <div class="form-check">
                    <input name="special_category[]" class="form-check-input" type="checkbox" value="must_haves" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Must Haves
                    </label>
                  </div>
              </div>

            <div class="form-group">
              <label for="product_price">Product Stock</label>
              <input type="number" name="product_stock" class="form-control" id="" placeholder="Number only..">
            </div>

            <div class="form-group">
                <label for="product_price">Product Weight</label>
                <input type="number" name="product_weight" class="form-control" id="" placeholder="...gr">
            </div>

            </div>
            <!-- <div class="form-group"> -->

              <button type="submit" class="text-center btn btn-primary">Submit</button>
            </div>
</form>





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
