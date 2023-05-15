


<?php

// strpos check url is contain inserted text or not.Such that,here check "product.php"
if (strpos($_SERVER['REQUEST_URI'], "product.php")) { ?>
  <script>
    $(function() {
      $('.management-parent').addClass("menu-open");
      $('.management-parent').addClass("actives");
      $('.all-product-li').addClass("actives");
    })
  </script>
<?php }

// strpos check url is contain inserted text or not.Such that,here check "product.php"
if (strpos($_SERVER['REQUEST_URI'], "dashboard.php")) {
?>
  <script>
    $(function() {
      $('.dashboard-li').addClass("actives");
    })
  </script>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], "category.php")) {
?>
  <script>
    $(function() {
      $('.management-parent').addClass("menu-open");
      $('.management-parent').addClass("actives");
      $('.brand_category-li').addClass("actives");
    })
  </script>
<?php
}
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4 shadow" style="min-height:100vh;">
  <!-- Brand Logo -->
  <a href="./profile.php" class="brand-link d-flex flex-column align-items-center justify-content-center" style="border:none !important;">
    <img class="shadow" id="sidebar_profile_logo" src="<?php echo $sidebarImage; ?>" style="height:100px;width:100px;border-radius:50%;text-decoration:none;">
    <!-- <span class="brand-text font-bold" id="sidebar_profile_name">User Name</span> -->
  </a>

  <!-- Sidebar -->
  <div class="sidebar ">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
        <li class="nav-item dashboard-li">
          <a href="./dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item common-li">
          <a href="./order.php" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Order
            </p>
          </a>
        </li>
        <li class="nav-item management-parent">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chess-queen"></i>
            <p>
              Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview pl-2">
            <li class="nav-item common-li">
              <a href="./common.php" class="nav-link">
                <i class=" fas fa-solid fa-angle-right"></i>
                <p>
                  Common
                </p>
              </a>
            </li>
            <li class="nav-item  all-product-li">
              <a href="./product.php" class="nav-link">
                <i class=" fas fa-solid fa-angle-right"></i>
                <p>Products</p>
              </a>
            </li>
            <li class="nav-item  brand_category-li">
              <a href="category.php" class="nav-link">
                <i class=" fas fa-solid fa-angle-right"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item  brand_category-li">
              <a href="cupon.php" class="nav-link">
                <i class=" fas fa-solid fa-angle-right"></i>
                <p>Cupon</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item logout-li">
          <a href="./action/logout.php" class="nav-link">
            <i class="nav-icon fas fa-solid fa-route font-weight-bold"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>