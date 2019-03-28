<?php
   echo "<h2>Update item in cart</h2><br>\n";

   $prod_id = $_GET['id'];

   $query = "SELECT description, price FROM products where prod_id = $prod_id";
   $result = mysql_query($query);
   $row = mysql_fetch_array($result, MYSQL_ASSOC);
   $description = $row['description'];
   $price = $row['price'];

   $quantity = $_SESSION['cart'][$prod_id];

   echo "<form action=\"index.php\" method=\"post\">\n";
   echo "<input type=\"hidden\" name=\"content\" value=\"changeitem\">\n";
   echo "<input type=\"hidden\" name=\"prod_id\" value=\"$prod_id\">\n";
   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td><h3>Product ID</h3></td><td>$prod_id</td></tr>\n";
   echo "<tr><td><h3>Description</h3></td><td>$description</td></tr>\n";
   printf("<tr><td><h3>Price</h3></td><td>$%.2lf</td></tr>\n", $price);
   echo "<tr><td><h3>Quantity</h3></td><td><input type=\"text\" name=\"quantity\" value=\"$quantity\"></td></tr>\n";

   $total = $price * $quantity;
   printf("<tr><td><h3>Total</h3></td><td>\$%.2lf</td></tr>\n", $total);
   echo "</table>\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Update\">\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Remove item from cart\">\n";
   echo "</form>\n";
?>