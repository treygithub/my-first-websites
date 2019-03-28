<?php 
   header("Content-type: image/jpeg");

   $prod_id = $_GET['id'];
   include("mylibrary/login.php");
   login();

   $query = "SELECT picture from products WHERE prod_id = $prod_id";
   $result = mysql_query($query);
   $row = mysql_fetch_array($result, MYSQL_ASSOC);
   $picture = $row['picture'];
   echo $picture;
?>