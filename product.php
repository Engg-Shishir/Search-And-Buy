<?php
include_once("./Frontend/layout/session-connection.php");

if(isset($_SERVER["PATH_INFO"])){
  echo"<pre>";
  print_r($_SERVER);
  echo"</pre>";
}