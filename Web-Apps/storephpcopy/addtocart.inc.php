<?php
   $prod_id = $_POST['prod_id'];
   $quantity = $_POST['quantity'];

   $query = "SELECT quantity, description FROM products WHERE prod_id = $prod_id";
   $result = mysql_query($query);
   $row = mysql_fetch_array($result);
   $stock = $row[0];
   $description = $row[1];

   if ($quantity > $stock)
   {
      echo "<h2>Sorry, there are only $stock $description left in stock</h2>\n";
      echo "<h2>Please select another quantity</h2>\n";
   } else
   {
      if (isset($_SESSION['cart'][$prod_id]))
      {
         $_SESSION['cart'][$prod_id] += $quantity;
      } else
      {
         $_SESSION['cart'][$prod_id] = $quantity;
      }
      echo "<h2 class=\"title2\">Product added to cart.</h2>\n";
   }
   echo "<h2><a href=\"index.php\">Continue shopping</a></h2><br>\n";
   echo "<h2><a href=\"index.php?content=checkout\">Check out</a></h2>\n";
?>