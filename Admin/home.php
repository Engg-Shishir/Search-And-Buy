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
    <title>Admin Home</title>
    <?php include_once("./layout/link-for-head-tag.php"); ?>
</head>
<body>

  <div class="containers">
    <div class="wrapper">
      <?php include_once("./layout/navBar.php");  ?>
      <?php include_once("./layout/sideBar.php");  ?>
      <div class="content-wrapper">

      </div>
    </div>
  </div>



  <?php
  include_once("./layout/link-for-body-tag.php");
  ?>

  <script src=""></script>
</body>

</html>