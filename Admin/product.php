<!-- Session Check -->
<?php include_once("./action/sessionCheck.php"); ?>
<!-- Load Sidebar Profile Image -->
<?php include_once("./action/load-profile-image.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Product</title>
    <?php include_once("./layout/link-for-head-tag.php"); ?>
</head>

<body>
  <div class="containers">
    <div class="wrapper">
      <!-- Navbar -->
      <?php include_once("./layout/navBar.php"); ?>
      <!-- Main Sidebar Container -->
      <?php include_once("./layout/sideBar.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content pt-2">
          <div class="card shadow">
            <div class="card-header ">
              <div class="row">
                <div class="col-md-6">
                  <div class="d-flex align-items-center">
                    <button id="show_insert_modal_btn" type="button" class="btn btn-default shadow" data-toggle="modal"
                      data-target="#exampleModal" data-backdrop="static"><i class="fas fa-plus"></i></button>

                    <select class="ml-3 form-select form-select-sm shadow" style="width:100px;"
                      id="product_show_by_limit">
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="all">All</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex align-items-center justify-content-end">
                    <div id="searchSpiner" class="spinner-border spinner-border-md mr-2" role="status"
                      style="opacity:0;"></div>
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="text" id="search_box" class="form-control float-right shadow" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default" id="product_search_btn">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body table-responsive p-0" id="dynamic_content">
              <table class="table table-bordered table-striped table-hover table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th style="text-align:center;">Image</th>
                    <th style="text-align:center;">Name</th>
                    <th style="text-align:center;">Price</th>
                    <th style="text-align:center;">Category</th>
                    <th style="text-align:center;">Quantity</th>
                    <th style="text-align:center;">Discount</th>
                    <th style="text-align:center;">Shiping Charge</th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>

              <div id="link" class="d-flex align-items-center justify-content-around mt-3 shadow">

              </div>
            </div>
          </div>
          <?php include_once "./component/inserProductModal.php"; ?>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
  </div>
  </div>


  <?php
  include_once("./layout/link-for-body-tag.php");
  ?>
  <!-- <script src="../Asset/js/admin/product.js"></script> -->
  <script src="../Asset/js/admin/load-product.js"></script>
  <script src="../Asset/js/admin/insert-product.js"></script>
</body>
</html>