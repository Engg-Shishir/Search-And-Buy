<?php
session_start();
include_once("../../../DB/connection.php");

$id = $_POST['catid'];

$query = "SELECT * FROM category WHERE category_id ='" . $id . "'";
$cust = mysqli_fetch_assoc(mysqli_query($conn, $query));


$oldPath = "../../../Asset/image/admin/category/".$cust["category_image"];
unlink($oldPath);

$sql = "DELETE FROM category WHERE category_id='" . $id . "'";
if (mysqli_query($conn, $sql)) {
  $_SESSION["successmesg"] = "Data deleted";
  header("location: ../../category.php");
}


?>