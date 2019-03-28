<?php
   echo "<h2>Pending Orders</h2><br>\n";

   $query = "SELECT t1.order_id, t1.cust_id, t1.date, t2.lastname";
   $query = $query . " FROM orders as t1, customers as t2";
   $query = $query . " WHERE t1.status = 'pending' AND t1.cust_id = t2.cust_id";
   $query = $query . "  ORDER BY t1.date";
   $result = mysql_query($query);

   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td>Order ID</td><td>Customer ID</td><td>Last Name</td><td>Date Submitted</td><td> </td></tr>\n";
   while($row=mysql_fetch_array($result, MYSQL_ASSOC))
   {
      $order_id = $row['order_id'];
      $cust_id = $row['cust_id'];
      $lastname = $row['lastname'];
      $date = $row['date'];

      echo "<tr><td>$order_id</td><td>$cust_id</td><td>$lastname</td><td>$date</td>\n";
      echo "<td><a href=\"admin.php?content=shiporder&id=$order_id\">Process</a></td></tr>\n";
   }
   echo "</table>\n";
?>