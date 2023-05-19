<?php
session_start();
include_once("./DB/connection.php");
?>

<?php
if (isset($_GET["url"])) {
  $slug = $_GET["url"];
  $resultset = mysqli_query($conn, "SELECT * from product where slug = '{$slug}' ");
  if (mysqli_num_rows($resultset) > 0) {
    $data = mysqli_fetch_assoc($resultset);
  }
  $person = json_decode($data['image']);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <?php if (isset($title)) {
      echo $title;
    } ?>
  </title>

  <link rel="stylesheet" href="./Asset/css/frontend/header.css">
  <link rel="stylesheet" href="./Asset/css/frontend/pdetails.css">
  <script src="https://kit.fontawesome.com/44fc86d735.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="./Asset/Plugin/zoom/dist/xzoom.css" media="all" />
  <link type="text/css" rel="stylesheet" media="all" href="./Asset/Plugin/zoom/fancybox/source/jquery.fancybox.css" />
  <link type="text/css" rel="stylesheet" media="all" href="./Asset/Plugin/zoom/magnific-popup/css/magnific-popup.css" />
</head>

<body>

  <div class="container">
    <div class="navbar">
      <div class="imagebar">
        <p class="hero">Search & Buy</p>
        <p class="slogan">Enjoy your shopping experience.</p>
      </div>

      <div class="rightbar">
        <a class="icon" href="">
          <i class="fas fa-shopping-cart"></i>
          <span>3</span>
        </a>
        <a class="login" href=""><i class="fas fa-regular"></i> Login</a>
      </div>
    </div>
    <div class="row searchbar">
      <form action="post">
        <div class="search">
          <span href="" class="typingtext typewrite" data-period="1000" data-type='[ "Search by brands (Bata,Loto,Easy)", "Search by name (watch,T-shirt)", "Search by price (500,1000,100)"]'>
          </span>
          <input type="text" class="searchTerm" id="searchTerm" onblur="myFunction()" />
          <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </form>
      <div class="searchproductshow" id="searchproductshow"></div>
    </div>
    <!-- echo substr_replace($your_text, "...", 20); -->
    <!-- #region -->







    <?php
    if (!isset($_GET["url"])) {
    ?>
      <div class="row title-row">
        <p class="titlesssss">Tranding Now</p>
      </div>
      <div class="row trending-product">
        <div class="product-item-box">
          <?php
          $conn = mysqli_connect("localhost", "root", "", "searchbuy");
          $query = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC LIMIT 6");
          if (mysqli_num_rows($query) > 0) {
            while ($row = $query->fetch_assoc()) {
              $lastProductID = $row["id"];
              $price = $row["price"];
              $data = json_decode($row["image"]);
              $sno = $row["sno"];
              $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($row['name'])));
          ?>
              <div class="product-item">
                <div class="product-item-card">
                  <div class="icon-box">
                    <div class="icon-box-inside-relative-box">
                      <div class="cart-icon">
                        <a href="./index.php"><i class="fas fa-solid fa-cart-plus"></i></a>
                      </div>
                      <a href="./<?php echo $slug; ?>" class="view-details">
                        <strong>View Details</strong>
                      </a>
                    </div>
                  </div>
                  <div class="main-box">
                    <div class="image">
                      <img class="default-img" src="./Asset/image/product/<?php echo $sno; ?>/<?php echo $data[0]; ?>" alt="#">
                    </div>
                    <div class="text text-center">
                      <p class="pname">
                        <?php echo $row['name']; ?>
                      </p>
                      <div class="ratings-box">
                        <span class="pprice">৳ 480</span>
                        <p class="ratingsno"> Ratings <span>(70)</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    <?php
    } else {
    ?>

      <div class="row bredcrumb">
        <span><a href="">
            <?php echo $data["category"]; ?>
          </a> <i class="fas fa-angle-right"></i></span>
        <span>LG <i class="fas fa-angle-right"></i></span>
        <span>Electic <i class="fas fa-angle-right"></i></span>
        <span><a href="">
            <?php echo $data["name"]; ?>
          </a></span>
      </div>

      <div class="row title-row">
        <p class="titlesssss">
          <?php echo $_GET["url"]; ?>
        </p>
      </div>

      <div class="row product-details">
        <div class="left">
          <div class="left-small-image">
            <?php
            foreach ($person as $key => $value) { ?>
              <img class="psmall-image" width="50" height="50px" src="./Asset/image/product/<?php echo $data["sno"]; ?>/<?php echo $value; ?>" />
            <?php
            }
            ?>
          </div>
          <div class="right-big-image">
            <div class="xzoom-container pt-2">
              <img width="400px" height="400px" class="xzoom" id="xzoom-fancy" src="./Asset/image/product/<?php echo $data["sno"]; ?>/<?php echo $person[0]; ?>" xoriginal="./Asset/image/product/<?php echo $data["sno"]; ?>/<?php echo $person[0]; ?>" />
            </div>
          </div>
        </div>
        <div class="right"></div>
      </div>

    <?php
    }
    ?>



  </div>
  <?php
  include_once("./Frontend/layout/link-for-body-tag.php");
  ?>

  <script type="text/javascript" src="./Asset/Plugin/zoom/fancybox/source/jquery.fancybox.js"></script>
  <script type="text/javascript" src="./Asset/Plugin/zoom/magnific-popup/js/magnific-popup.js"></script>
  <script type="text/javascript" src="./Asset/Plugin/zoom/dist/xzoom.min.js"></script>
  <script src="./Asset/Plugin/zoom/js/settings.js"></script>
</body>

</html>