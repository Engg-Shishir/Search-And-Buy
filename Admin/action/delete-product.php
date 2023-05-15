<?php
session_start();
include_once("../../DB/connection.php");


$action = $_POST['action'];

if ($action == "delete") {
  $storePath = "../../Asset/image/product/" . $_POST['sno'] . "/";
  unlinkImage($storePath);

  $sql = "DELETE FROM product WHERE sno='" . $_POST['sno'] . "'";
  if (mysqli_query($conn, $sql) == TRUE) {
    echo "done";
  }
}




function unlinkImage($storePath)
{
  $files = glob($storePath . "*");
  if ($files) {
    foreach ($files as $file) { // iterate files
      if (is_file($file)) {
        unlink($file); // delete file one by one
      }
    }
    rmdir($storePath); // delete each product folder
  }
}