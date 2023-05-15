<?php
session_start();
include_once("../../DB/connection.php");


$action = $_POST['actions'];

if ($action == "edit") {
  $sno = $_POST['sno'];
  $query = "SELECT * FROM `product` WHERE id ='" . $sno . "'";
  $query_run = mysqli_query($conn, $query);

  $cust = mysqli_fetch_assoc($query_run);
  if (mysqli_num_rows($query_run) > 0) {
    echo json_encode($cust);
  }
}