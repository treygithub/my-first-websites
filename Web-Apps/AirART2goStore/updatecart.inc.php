<?php
   $prod_id = $_GET['id'];

   echo "<h2 class=\"title\">Add item to cart</h2>\n";

   $query = "SELECT description, price from products where prod_id = $prod_id";
   $result = mysql_query($query);

   $row=mysql_fetch_array($result, MYSQL_ASSOC);

   $description = $row['description'];
   $price = $row['price'];
   $quantity = 1;

  
   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td>Image</td><td>Product</td><td>Price</td><td>Quantity</td></tr>\n";
   echo "<tr><td><img src=\"showimage.php?id=$prod_id\" width=\"250\" height=\"267\"></td>\n";
   echo "<td>$description</td><td>$price</td>\n";
   echo "<td><input type=\"text\" name=\"quantity\" value=\"$quantity\" size=\"3\"</td></tr>\n";
   echo "</table>\n";
  
      echo "<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">\n";
echo "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n";
echo "<input type=\"hidden\" name=\"hosted_button_id\" value=\"6KUQWHT6WFBY2\">\n";
echo "<table>\n";
echo " <tr><td><input type=\"hidden\" name=\"on0\" value=\"Enter item name here\">Enter item name here</td></tr><tr><td><input type=\"text\" name=\"os0\" maxlength=\"200\"></td></tr>\n";
echo "</table>\n";
echo "<input type=\"image\" src=\"https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\n";
echo "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n";
echo "</form>\n";

?>