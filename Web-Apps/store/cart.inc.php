<?php
   echo "<h2 class=\"title\">Your shopping cart:</h2>\n";
   if (!isset($_SESSION['cart']))
   {
      $_SESSION['cart'] = array();
      echo " <h2>is empty </h2>\n";
   } else
   {
      $items = count($_SESSION['cart']);
      if ($items == 0)
      {
          echo " <h2>is empty </h2>\n";
      } else
      {
         $total = 0;
         echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
         echo "<tr><td>Product</td><td>Quantity</td><td>Total</td></tr>\n";
         foreach($_SESSION['cart'] as $prod_id => $quantity)
         {
            $query = "SELECT description, price FROM products WHERE prod_id = $prod_id";
            $result = mysql_query($query);
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $description = $row['description'];
            $price = $row['price'];

            $subtotal = $price * $quantity;
            $total += $subtotal;

            printf("<tr><td>%s</td><td>%s</td><td>$%.2lf</td></tr>\n", $description, $quantity, $subtotal);
         }
         printf("<tr><td colspan=\"2\">Total</td><td>$%.2lf</td></tr>\n", $total);
         echo "</table>\n";

      }
   }
?>