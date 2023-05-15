<?php 
  include_once("../SearchAndBye/Frontend/layout/head.php");  
?>

<?php
  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  $sql = "SELECT * FROM search ORDER BY id ASC";
  $result = mysqli_query($conn,$sql);
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
         while($row=mysqli_fetch_array($result)){
      ?>
        <a href="" class="card">
          <div class="image">
            <img src="<?php  echo $row['image']; ?>" alt="">
          </div>
          <div class="text">
            <div class="pname"><?php  echo $row['name']; ?></div>
            <p class="pratings">
            <span class="pprice">৳ 480</span>
              <span class="ratingbox">
                  <img src="" alt="">
                  Ratings 
                  <span class="ratingsno">(70)</span> 
              </span>
            </p>
          </div>
        </a>
      <?php
         }
      ?>
      </div>
    </div>
  </div>


<?php 
  include_once("./Frontend/layout/link-for-body-tag.php");  
?>
