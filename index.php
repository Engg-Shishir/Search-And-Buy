<?php
include_once("../SearchAndBye/Frontend/layout/head.php");
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "searchbuy");
$query = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC LIMIT 6");
if (mysqli_num_rows($query) > 0) {
  while ($row = $query->fetch_assoc()) {
    $lastProductID = $row["id"];
    $price = $row["price"];
    $data =  json_decode($row["image"]);
    $sno = $row["sno"];
  }
}
?>

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
      ?>
      <div class="product-item">
        <div class="product-item-card">
          <div class="icon-box">
            <div class="icon-box-inside-relative-box">
              <div class="cart-icon">
                <a href="./index.php"><i class="fas fa-solid fa-cart-plus"></i></a>
              </div>
              <a href="./" class="view-details">
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


</div>


<?php
include_once("./Frontend/layout/link-for-body-tag.php");
?>