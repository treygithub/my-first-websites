<h2 class="title">Welcome to our store!</h2>
<p>Please feel free to browse our great selection of products. Select the category from the drop-down menu in the navigation bar located on the left or use the search bar below it. Add items to your cart, then check out.
<p>
<h2 class="title2">Items on sale today:</h2>

<?php
   $query = "SELECT * from products where onsale = TRUE";
   $result = mysql_query($query);

   echo "<table width=\"100%\" border=\"0\">\n";
   while($row=mysql_fetch_array($result, MYSQL_ASSOC))
   {
      $prod_id = $row['prod_id'];
      $description = $row['description'];
      $price = $row['price'];
      $quantity = $row['quantity'];
 
      echo "<tr><td>\n";
         echo "<img src=\"showimage.php?id=$prod_id\" width=\"80\" height=\"60\">";
      echo "</td><td>\n";
         if ($quantity == 0)
            echo "<font size=\"3\">$description</font>\n";
         else
         {
            echo "<a href=\"index.php?&content=updatecart&id=$prod_id\">";
            echo "<font size=\"3\"><b><u>$description</u></b></font>\n";
         }
      echo "</td><td>\n";
         printf("$%.2f\n", $price);
      echo "</td><td>\n";
         if ($quantity == 0)
            echo "<font color=\"red\">Sorry, this item out of stock</font>\n";
         else if ($quantity < 5)
            echo "Hurry, only $quantity left in stock!\n";
         else
            echo " \n";
      echo "</td></tr>\n";
   }
   echo "</table>\n";
?>