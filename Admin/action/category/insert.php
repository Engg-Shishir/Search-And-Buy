<?php
session_start();
$host = "localhost";
$dbName = "searchbuy";
$user = "root";
$password = "";

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn = mysqli_connect("shishirbhuiyan.tech", "shishirb", "L4f+Z208oRcT+l", "shishirb_ecom");

$img_ext = "";
$tmp_name = "";
$new_img_name = "";
if (isset($_FILES['image'])) {
   $img_name = $_FILES['image']['name'];
   $img_type = $_FILES['image']['type'];
   $tmp_name = $_FILES['image']['tmp_name'];
   $img_explode = explode('.', $img_name);
   $img_ext = end($img_explode);
}




$category = $_POST["catefild"];
$description = $_POST["description"];
$parent_id = 0;
$slug = preg_replace('/[^a-z0-9]+/i', '-', trim($category));
$dirname = "../../../Asset/image/admin/category/";


//  Update Category
if ($_POST["updatecategoryhiddenid"]!="") {

   $query = "SELECT * FROM category WHERE category_id ='" . $_POST["updatecategoryhiddenid"] . "'";
   $cust = mysqli_fetch_assoc(mysqli_query($conn, $query));
   $oldfile = $dirname . $cust["category_image"];


   if ($img_ext != "") {
      if (is_file($oldfile))
         unlink($oldfile);
      $new_img_name = $slug . "." . $img_ext;
      $path = $dirname . $new_img_name;
      move_uploaded_file($tmp_name, $path);
   } else {
      $oldimg_explode = explode('.', $cust["category_image"]);
      $img_ext = end($oldimg_explode);
      $new_img_name = $slug . "." . $img_ext;
      $path = $dirname . $new_img_name;
      rename($oldfile, $path);
   }



   $sql = "UPDATE `category` SET `category_image`='" . $new_img_name . "',`category_name`='" . $category . "',`description`='" . $description . "',`parent_id`='" . $parent_id . "' WHERE `category_id`='" . $_POST["updatecategoryhiddenid"] . "'";
   $isRun = mysqli_query($conn, $sql); // Return Boolean

   if ($isRun) {
      $_SESSION["successmesg"] = "Data Updated";
      header("location: ../../category.php");
   }

} else {
   $new_img_name = $slug . "." . $img_ext;
   $dirname = "../../../Asset/image/admin/category/";
   $path = $dirname . $new_img_name;
    
      $sqlsss = "INSERT INTO category(category_image,category_name, `description`,parent_id) VALUES ('".$new_img_name."','".$category."','".$description."','".$parent_id."')";
      $isRun = mysqli_query($conn,$sqlsss);
      if($isRun){
         if (move_uploaded_file($tmp_name, $path)){
            $_SESSION["successmesg"] = "Data Inserted";
            header("location: ../../category.php");
         }else{
            $_SESSION["successmesg"] = "Data Inserted failed";
            header("location: ../../category.php");
         }
      }
   


}







?>