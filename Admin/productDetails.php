<!-- Session Check -->
<?php include_once("./action/sessionCheck.php"); ?>
<!-- Load Sidebar Profile Image -->
<?php include_once("./action/load-profile-image.php"); ?>



<?php
// include_once("../DB/connection.php");
$sno = $_GET['sno'];
$resultset = mysqli_query($conn, "SELECT * from `product` where sno = '{$_GET['sno']}' ");
if (mysqli_num_rows($resultset) > 0) {
  $data = mysqli_fetch_assoc($resultset);
}
$person = json_decode($data['image']);
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Profile</title>
  <?php include_once("./layout/link-for-head-tag.php"); ?>


  <link type="text/css" rel="stylesheet" media="all" href="../Asset/css/admin/productDetails.css" />
  <script src="../Asset/Plugin/zoom/js/vendor/jquery.js"></script>
  <script type="text/javascript" src="../Asset/Plugin/zoom/dist/xzoom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../Asset/Plugin/zoom/dist/xzoom.css" media="all" />


  <link type="text/css" rel="stylesheet" media="all" href="../Asset/Plugin/zoom/fancybox/source/jquery.fancybox.css" />
  <script type="text/javascript" src="../Asset/Plugin/zoom/fancybox/source/jquery.fancybox.js"></script>

  <link type="text/css" rel="stylesheet" media="all" href="../Asset/Plugin/zoom/magnific-popup/css/magnific-popup.css" />
  <script type="text/javascript" src="../Asset/Plugin/zoom/magnific-popup/js/magnific-popup.js"></script>

  <script src="../Asset/Plugin/zoom/js/productDetailsPageSetup.js"></script>

</head>

<body>
  </head>

  <body>
    <div class="containers">
      <div class="wrapper">
        <?php include_once("./layout/navBar.php");  ?>
        <?php include_once("./layout/sideBar.php");  ?>
        <div class="content-wrapper">
          <section id="fancy">
            <div class="container">
              <div class="row">
                <div class="col-md-5">
                  <div class="xzoom-container pt-2">
                    <img width="400px" height="400px" class="xzoom4" id="xzoom-fancy" src="../Asset/image/product/<?php echo $sno; ?>/<?php echo $person[0]; ?>" xoriginal="../Asset/image/product/<?php echo $sno; ?>/<?php echo $person[0]; ?>" />

                    <div class="xzoom-thumbs mt-2">
                      <?php
                      foreach ($person as $key => $value) { ?>
                        <a href="../Asset/image/product/<?php echo $sno; ?>/<?php echo $value; ?>">
                          <img class="xzoom-gallery4" width="80" height="80px" src="../Asset/image/product/<?php echo $sno; ?>/<?php echo $value; ?>" />
                        </a>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="details col-md-7 p-3">
                  <h3 class="product-title mr-1"><?php echo $data['name'];   ?></h3>
                  <div class="row">
                    <h4 class="price">current price: <span>$<?php echo $data['price'];   ?></span></h4>
                  </div>



                  <div class="row">
                    <div class="col-md-12">
                      <p><?php echo $data['details'];   ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Quantity</span>
                        </div>
                        <input type="number" class="form-control" value="<?php echo $data['quantity'];   ?>" class="text-center productQty" />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle colorToggleButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Color
                          </button>
                          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item selectColor" href="#">Red</a>
                            <a class="dropdown-item selectColor" href="#">Green</a>
                            <a class="dropdown-item selectColor" href="#">Orange</a>
                            <a class="dropdown-item selectColor" href="#">Black</a>
                          </div>
                        </div>
                        <div class="btn-group" role="group">
                          <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle sizeToggleButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Size
                          </button>
                          <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                            <a class="dropdown-item selectSize" href="#">S</a>
                            <a class="dropdown-item selectSize" href="#">M</a>
                            <a class="dropdown-item selectSize" href="#">L</a>
                            <a class="dropdown-item selectSize" href="#">XL</a>
                            <a class="dropdown-item selectSize" href="#">XXL</a>
                          </div>
                        </div>
                        <button type="button" class="btn btn-secondary"><i class="fas fa-solid fa-cart-plus"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="fas fa-heart"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </section>
      </div>
    </div>
    </div>

<?php
include_once("./layout/link-for-body-tag.php");
?>
    <script>
    $(function() {
      $('.selectColor').on("click", function() {
        var color = $(this).text().toLowerCase();
        $('.colorToggleButton').css({
          'background-color': color,
          'color': 'white'
        });
      });
      $('.selectSize').on("click", function() {
        var size = $(this).text();
        $('.sizeToggleButton').text(size);
      });
    });
  </script>
  </body>
</html>