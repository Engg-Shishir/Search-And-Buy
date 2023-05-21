


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
<aside class="main-sidebar navbar-light" style="min-height:100vh;">
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
          <a href="./home.php" class="nav-link">
          <i class="nav-icon fas fa-th" aria-hidden="true" style="font-family:Font Awesome 5 Free, Bangla650, sans-serif;"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item dashboard-li">
          <a href="./profile.php" class="nav-link">
          <i class="nav-icon fas fa-user" aria-hidden="true" style="font-family:Font Awesome 5 Free, Bangla650, sans-serif;"></i>
            <p>
              Profile
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
              <a href="brand.php" class="nav-link">
                <i class=" fas fa-solid fa-angle-right"></i>
                <p>Brand</p>
              </a>
            </li>
            <li class="nav-item  brand_category-li">
              <a href="shop.php" class="nav-link">
                <i class=" fas fa-solid fa-angle-right"></i>
                <p>Shop</p>
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

<aside class="control-sidebar control-sidebar-dark" style="top: 56.8px; height: 665.2px; display: block;">

  <div class="p-3 control-sidebar-content os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-overflow os-host-overflow-y" style="height: 665.2px;">
    <div class="os-resize-observer-host observed">
         <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
    </div>

    <div class="os-resize-observer"></div>
  
    <div class="os-content-glue" style="margin: -16px;"></div>
    <div class="os-padding">
      <div class="os-viewport os-viewport-native-scrollbars-invisible">
          <div class="os-content" style="padding: 16px; height: 100%; width: 100%;">
            <h5>Customize AdminLTE</h5><hr class="mb-2">
            <div class="mb-4">
              <input type="checkbox" value="1" class="mr-1"><span>Dark Mode</span>
            </div>
          </div>
    </div></div></div>

</aside>