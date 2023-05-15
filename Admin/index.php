<?php 
  session_start();
  if(isset($_SESSION['adminSession'])){
    header("location: ./home.php");
  }else{
      header("location: ./login.php");
  }
?>
