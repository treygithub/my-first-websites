<?php
   $prod_id = $_GET['id'];
   $query = "SELECT prod_id, cat_id, description, price, quantity, onsale FROM products where prod_id = $prod_id";

   $result = mysql_query($query);

   $row = mysql_fetch_array($result, MYSQL_ASSOC);

   $cat_id = $row['cat_id'];
   $description = $row['description'];
   $price = $row['price'];
   $quantity = $row['quantity'];
   $onsale = $row['onsale'];

   $query = "SELECT name FROM categories WHERE cat_id = $cat_id";
   $result=mysql_query($query);
   $row = mysql_fetch_array($result, MYSQL_ASSOC);

   $catname = $row['name'];

   echo "<h2>Update Product Information</h2>\n";

   echo "<form enctype=\"multipart/form-data\" action=\"admin.php\" method=\"post\">\n";
   echo "<input type=\"hidden\" name=\"content\" value=\"changeproduct\">\n";
   echo "<input type=\"hidden\" name=\"prod_id\" value=\"$prod_id\">\n";
   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td><h3>Product ID</h3></td><td>$prod_id</td></tr>\n";
   echo "<tr><td><h3>Category</h3></td>\n";
   echo "<td><select name=\"cat_id\">\n";

   $query="SELECT cat_id,name from categories";
   $result=mysql_query($query);
   while($row=mysql_fetch_array($result,MYSQL_ASSOC))
   {
       $tempcatid = $row['cat_id'];
       $name = $row['name'];
       if ($tempcatid == $cat_id)
         echo "<option value=\"$tempcatid\" selected=\"selected\">$name</option>\n";
       else
         echo "<option value=\"$tempcatid\">$name</option>";
   }
   echo "</select></td></tr>\n";
   echo "<tr><td><h3>Description</h3></td><td><input type=\"text\" name=\"description\" value=\"$description\"></td></tr>\n";
   echo "<tr><td><h3>Price</h3></td><td><input type=\"text\" name=\"price\" value=\"$price\"></td></tr>\n";
   echo "<tr><td><h3>Quantity</h3></td><td><input type=\"text\" name=\"quantity\" value=\"$quantity\"></td></tr>\n";
   if ($onsale)
      echo "<tr><td><h3>On Sale</h3></td><td><input type=\"checkbox\" name=\"onsale\" value=\"1\" checked></td></tr>\n";
   else
      echo "<tr><td><h3>On Sale</h3></td><td><input type=\"checkbox\" name=\"onsale\" value=\"1\"></td></tr>\n";
   echo "<tr><td><h3>Image</h3></td><td><img src=\"showimage.php?id=$prod_id\" width=\"80\" height=\"60\"></td></tr>\n";
   echo "<tr><td><h3>Update image</h3></td><td><input type=\"file\" name=\"picture\"></td></tr>\n";
   echo "</table>\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Update\">\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Delete Product\">\n";
   echo "</form>\n";
?>