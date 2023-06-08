<?php
  session_start();
  include_once("../../DB/connection.php");


$text = $_POST['texts'];


$ok = "SELECT * FROM product WHERE (name LIKE '%$text%' OR price LIKE '%$text%' OR category LIKE '%$text%' OR scharge LIKE '%$text%')";


// $sql = "SELECT * FROM product WHERE name LIKE '%$text%' OR price LIKE '%$text%'";
$result = mysqli_query($conn,$ok);
$rows = mysqli_num_rows($result);

$output="";



if($rows < 1){
  echo '<div class="text-center my-4 product-not-found">
     <img src="https://i.postimg.cc/nLGxZbfL/Frame-588.png" alt="">
  </div>';
}


while($row=mysqli_fetch_assoc($result)){
  $pdata = json_decode($row['image']);
  $url = "./Asset/image/product/".$row['sno']."/".$pdata[0];
  echo '<div class="product-list">
      <div class="image">
        <img src="'.$url.'" alt="">
      </div>
      <a href="">'.$row['name'].'</a>
    </div>';
}

$conn->close();
?>
