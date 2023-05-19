<?php
include_once("./Frontend/layout/session-connection.php");

$fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']
  === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$slug = basename($fullUrl);
?>





<?php
include_once("./Frontend/layout/session-connection.php");
echo"<pre>";
print_r($_SERVER);
echo"</pre>";

?>



<!-- .htacccess file code
RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-l
    RewriteRule ^(.*)$ index.php?url=$1 [QSA,L] -->

<?php




if(isset($_GET["url"])){
  echo $_GET["url"];
}

?>