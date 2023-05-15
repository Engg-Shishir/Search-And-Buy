<?php
  session_start();
  include_once("../../DB/connection.php");


$text = $_POST['texts'];



$sql = "SELECT * FROM search WHERE name LIKE '%$text%'";
$result = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($result);

$output="";



if($rows < 1){
  echo '<div class="text-center my-4 product-not-found">
     <img src="https://i.postimg.cc/nLGxZbfL/Frame-588.png" alt="">
  </div>';
}


while($row=mysqli_fetch_assoc($result)){
  echo '<div class="product-list">
      <div class="image">
        <img src="'.$row['image'].'" alt="">
      </div>
      <a href="">'.$row['name'].'</a>
    </div>';
}

$conn->close();
?>
