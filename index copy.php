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
          <span class="wrap"></span>
        </span>
        <input type="text" class="searchTerm" id="searchTerm" onblur="myFunction()" />
        <button type="submit" class="searchButton">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </form>
    <div class="searchproductshow" id="searchproductshow">
    </div>
  </div>
  <!-- echo substr_replace($your_text, "...", 20); -->
  <div class="row high-sell">
    <h3 class="title">Trending Now</h3>
    <div class="card-box">
      <?php
      $conn = mysqli_connect("localhost", "root", "", "searchbuy");
      $query = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC LIMIT 6");
      if (mysqli_num_rows($query) > 0) {
        while ($row = $query->fetch_assoc()) {
          $lastProductID = $row["id"];
          $price = $row["price"];
          $data =  json_decode($row["image"]);
          $sno = $row["sno"];
      ?>
          <a href="" class="card">
            <div class="cards-box">
              <div class="image">
                <img class="default-img" src="./Asset/image/product/<?php echo $sno; ?>/<?php echo $data[0]; ?>" alt="#">
              </div>
              <div class="text">
                <div class="pname"><?php echo $row['name']; ?></div>
                <p class="pratings">
                  <span class="pprice">৳ 480</span>
                  <span class="ratingbox">
                    <img src="" alt="">
                    Ratings
                    <span class="ratingsno">(70)</span>
                  </span>
                </p>
              </div>
            </div>
            <div class="hello">
              <a href="" class="link"></a>
            </div>
          </a>
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