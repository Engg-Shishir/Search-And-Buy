<?php

   include_once("../../../DB/connection.php");

	$query = "SELECT * FROM category WHERE category_id ='".$_POST["id"]."'";
	$row = mysqli_query($conn, $query);
	$cust = mysqli_fetch_assoc($row);


	$file = "../../../Asset/2.png";
	if(is_file($file)){
	 echo"exitd dgdhfhf ffhghghg ghghgh";
	 unlink($file);
	}
 
	if (mysqli_num_rows($row) > 0) {
    echo json_encode($cust);
	}

?>