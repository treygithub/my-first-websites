<?php
   $prod_id = $_GET['id'];

   echo "<h2 class=\"title\">Add item to cart</h2>\n";

   $query = "SELECT description, price from products where prod_id = $prod_id";
   $result = mysql_query($query);

   $row=mysql_fetch_array($result, MYSQL_ASSOC);

   $description = $row['description'];
   $price = $row['price'];
   $quantity = 1;

   echo "<form action=\"index.php\" method=\"post\">\n";
   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td>Image</td><td>Product</td><td>Price</td><td>Quantity</td></tr>\n";
   echo "<tr><td><img src=\"showimage.php?id=$prod_id\" width=\"80\" height=\"60\"></td>\n";
   echo "<td>$description</td><td>$price</td>\n";
   echo "<td><input type=\"text\" name=\"quantity\" value=\"$quantity\" size=\"3\"</td></tr>\n";
   echo "</table>\n";
   echo "<input type=\"hidden\" name=\"content\" value=\"addtocart\">\n";
   echo "<input type=\"hidden\" name=\"prod_id\" value=\"$prod_id\">\n";
   echo "<input type=\"submit\" value=\"addtocart\">\n";
   echo "</form>\n";
?>