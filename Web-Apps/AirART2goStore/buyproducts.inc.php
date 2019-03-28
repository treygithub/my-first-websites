<?php
   $cat_id = $_GET['cat'];
   $query="SELECT name from categories WHERE cat_id = $cat_id";
   $result = mysql_query($query);
   $row=mysql_fetch_array($result, MYSQL_ASSOC);
   echo "<h1 style=\"padding:2rem\">{$row['name']} - Click on a product to purchase it</h1>\n";

   if (!isset($_GET['page']))
      $page = 1;
   else
      $page = $_GET['page'];

showproducts($cat_id, $page, "index.php?content=buyproducts", "index.php?content=updatecart");
?>