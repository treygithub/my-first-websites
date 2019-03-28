<?php
   $button = $_POST['button'];
   $prod_id = $_POST['prod_id'];
   if ($button == "Update")
   {
      $quantity = $_POST['quantity'];
      $_SESSION['cart'][$prod_id] = $quantity;
      echo "<h2>Item quantity updated in cart</h2>\n";
      echo "<a href=\"index.php?content=reviewcart\">Review cart</a>\n";
   } else
   {
      unset($_SESSION['cart'][$prod_id]);
      echo "<h2>Item removed from cart</h2>\n";
      echo "<a href=\"index.php?content=reviewcart\">Review cart</a>\n";
   }

?>