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
   echo "<tr><td>Image</td><td>Product</td><td>Price</td></tr>\n";
   echo "<tr><td><img src=\"showimage.php?id=$prod_id\" width=\"80\" height=\"60\"></td>\n";
   echo "<td>$description</td><td>$price</td>\n";
   
   echo "</table>\n";
   echo "</form>\n";
    echo"<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">\n";
    echo "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n";
    echo "<input type=\"hidden\" name=\"hosted_button_id\" value=\"PG675GD65RTM8\">\n";
    echo "<table>\n";
    echo "<tr><td><input type=\"hidden\" name=\"on0\" value=\"Quanity\">Quanity</td></tr><tr><td><select name=\"os0\">\n";
	echo "<option value=\"4 huge squash\">4 huge squash $10.00 USD</option>\n";
	echo "<option value=\"7 huge squash\">7 huge squash $15.00 USD</option>\n";
	echo "<option value=\"9 huge squash\">9 huge squash $20.00 USD</option>\n";
    echo "</select> </td></tr>\n";
    echo "</table>\n";
    echo "<input type=\"hidden\" name=\"currency_code\" value=\"USD\">\n";
    echo "<input type=\"image\" src=\"https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\n";
    echo "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n";
    echo "</form>\n";
?>