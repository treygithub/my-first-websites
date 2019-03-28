<?php
   $order_id = $_GET['id'];

   $query = "SELECT t1.order_id, t1.cust_id, t1.date,";
   $query = $query . " t2.lastname, t2.firstname, t2.address,";
   $query = $query . " t2.city, t2.state, t2.zip FROM";
   $query = $query . " orders as t1, customers as t2 WHERE t1.order_id = $order_id AND";
   $query = $query . " t1.cust_id = t2.cust_id";
   $result = mysql_query($query);
   $row = mysql_fetch_array($result, MYSQL_ASSOC);
   $cust_id = $row['cust_id'];
   $date = $row['date'];
   $firstname = $row['firstname'];
   $lastname = $row['lastname'];
   $address = $row['address'];
   $city = $row['city'];
   $state = $row['state'];
   $zip = $row['zip'];

   echo "<h2>Order information for order #" . $order_id . "</h2><br>\n";

   echo $firstname . " " . $lastname . "<br>\n";
   echo $address . "<br>\n";
   echo $city . ", " . $state . "  " . $zip . "<br><br>\n";
   
   echo "<h3>Items:</h3>\n";
   echo "<table width=\"75%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td>Product ID</td><td>Description</td><td>Price</td><td>Quantity</td><td>Total</td></tr>\n";

   $query = "SELECT t1.prod_id, t1.quantity, t2.description, t2.price";
   $query = $query . " FROM order_items as t1, products as t2 WHERE t1.order_id = $order_id";
   $query = $query . " AND t1.prod_id = t2.prod_id";
   $result = mysql_query($query);

   $total = 0;
   while($row = mysql_fetch_array($result, MYSQL_ASSOC))
   {
      $prod_id = $row['prod_id'];
      $quantity = $row['quantity'];
      $description = $row['description'];
      $price = $row['price'];

      $subtotal = $price * $quantity;
      $total += $subtotal;

      echo "<tr><td>$prod_id</td><td>$description</td>\n";
      printf("<td>%.2f</td><td>%d</td><td>%.2f</td></tr>\n", $price, $quantity, $subtotal);
   }
   echo "<tr><td colspan=\"4\"><b>Order Total</b></td>\n";
   printf("<td>%.2f</td></tr>\n", $total);
   echo "</table>\n";

   echo "<form action=\"admin.php\" method=\"post\">\n";
   echo "<input type=\"hidden\" name=\"content\" value=\"postorder\">\n";
   echo "<input type=\"hidden\" name=\"order_id\" value=\"$order_id\">\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Post order\">\n";
   echo "</form>\n";
?>