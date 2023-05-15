<?php 
   session_start(); 
   include_once("./DB/connection.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> <?php if (isset($title)) {echo $title;}?></title>
  <?php include_once("/xampp/htdocs/SearchAndBye/Frontend/layout/link-for-head-tag.php"); ?>
</head>
<body>