<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "searchbuy");
$query = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC LIMIT 6");
if (mysqli_num_rows($query) > 0) {
  while ($row = $query->fetch_assoc()) {
    $lastProductID = $row["id"];
    $price = $row["price"];
    $data = json_decode($row["image"]);
    $sno = $row["sno"];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>bb</title>

  <title>bb</title>
  <link rel="stylesheet" href="./Asset/css/frontend/header.css">
  <script src="https://kit.fontawesome.com/44fc86d735.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./Asset/css/frontend/style.css">
  <link rel="stylesheet" href="./Asset/css/frontend/pdetails.css">
  <link rel="stylesheet" href="./Asset/Plugin/mainzoom/style.css">

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
      $slug = $_GET["url"];
      $resultset = mysqli_query($conn, "SELECT * from product where slug = '{$slug}' ");
      if (mysqli_num_rows($resultset) > 0) {
        $data = mysqli_fetch_assoc($resultset);
      }
      $person = json_decode($data['image']);
    ?>

      <div class="row bredcrumb">
        <span>
          <a href="">
            <?php echo $data["category"]; ?>
          </a>
          <i class="fas fa-long-arrow-alt-right" style="font-family:Font Awesome 5 Free, Bangla806, sans-serif;"></i></i>
        </span>
        <span>LG <i class="fas fa-long-arrow-alt-right" style="font-family:Font Awesome 5 Free, Bangla806, sans-serif;"></i></span>
        <span>Electic <i class="fas fa-long-arrow-alt-right" style="font-family:Font Awesome 5 Free, Bangla806, sans-serif;"></i></i></span>
        <span><a href="">
            <?php echo $data["name"]; ?>
          </a></span>
      </div>


      <div class="product-details">
        <div class="image">
          <div class="bigimage">
            <div class="picZoomer">
              <img class="xzoom" id="xzoom-fancy" src="./Asset/image/product/<?php echo $data["sno"]; ?>/<?php echo $person[0]; ?>" />
            </div>
          </div>
          <div class="smallimage">
            <?php
            foreach ($person as $key => $value) {
            ?>
              <img class="psmall-image <?php if ($key == 0)
                                          echo "active" ?>" width="50" height="50px" src="./Asset/image/product/<?php echo $data["sno"]; ?>/<?php echo $value; ?>" />
            <?php
            }
            ?>
          </div>
        </div>
        <div class="details">
          <p class="name">
            <?php echo $data["name"]; ?>
          </p>
          <p class="sno">SNO :
            <?php if (isset($data["sno"]))
              echo $data["sno"]; ?>
          </p>
          <div class="price">
            <div class="rprice">Regular Price Tk &nbsp;
              <?php if (isset($data["price"]))
                echo $data["price"]; ?>
            </div>
            <div class="sprice">Special Price Tk &nbsp;
              <?php if (isset($data["price"]))
                echo $data["price"]; ?>
            </div>
          </div>

          <div class="quickoverview">
            <p class="quickoverviewtitle">Quick Overview</p>
            <div class="quickoverviewlist">
              <ul>
                <li>Heart Rate - Yes</li>
                <li>Watch Size - 42mm</li>
                <li>Waterproof - Yes</li>
                <li>Cellular Network - No</li>
                <li>Screen/Display Size. - 1.75 Inch</li>
              </ul>
            </div>

            <div class="btn-group">
              <a href="">Add to Cart</a>
              <a href="">Order Procedure</a>
              <a href="#specification-cnt">Specification</a>
              <a href="">Q&A</a>
              <a href="">Review</a>
            </div>
          </div>

          .
        </div>
        <div class="specifiction">
          <div class="row title-row">
            <p class="titlesssss"> Similar Product </p>
          </div>
          <div class="related-product-box">
            <?php
            $category = $data["category"];
            $query = mysqli_query($conn, "SELECT * FROM product where category='{$category}' ORDER BY id DESC LIMIT 5");
            if (mysqli_num_rows($query) > 0) {
              while ($row = $query->fetch_assoc()) {
                $lastProductID = $row["id"];
                $price = $row["price"];
                $data = json_decode($row["image"]);
                $sno = $row["sno"];
                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($row['name'])));
            ?>

                <div class="similar-product-card">
                  <div class="top">
                    <div class="similar-product-card-image">
                      <img src="./Asset/image/product/<?php echo $sno; ?>/<?php echo $data[0]; ?>" alt="">
                    </div>
                    <div class="similar-product-card-name">
                      <p class="name">
                        <?php echo $row["name"]; ?>
                      </p>
                      <div class="others">
                        <p class="name">Tk
                          <?php echo $row["price"]; ?>
                        </p>
                        <a href="/view/<?php echo $slug; ?>"><i class="fas fa-eye"></i></a>
                        <a href="/cart/<?php echo $slug; ?>">Add to cart</a>
                      </div>
                    </div>
                  </div>
                  <div class="bottom"></div>
                </div>
            <?php
              }
            }
            ?>
          </div>          
          <div class="row seemore">

</div>
        </div>

      </div>
       
      <div class="row title-row" id="specification-cnt">
        <p class="titlesssss">Specification </p>
      </div>
      <div class="row specification-cnt"></div>
    <?php
    }
    ?>
  </div>

  <?php
  include_once("./Frontend/layout/link-for-body-tag.php");
  ?>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="./Asset/Plugin/mainzoom/script.js"></script>
</body>

</html>