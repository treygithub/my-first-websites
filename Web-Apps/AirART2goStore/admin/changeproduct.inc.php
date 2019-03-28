<?php

   $delete = $_POST['button'];
   if ($delete == "Delete Product")
   {
      $prod_id = $_POST['prod_id'];
      $query = "DELETE from products WHERE prod_id = $prod_id";
      $result = mysql_query($query);
      if ($result)
      {
         echo "<h2>Product: $prod_id deleted</h2>\n";
         exit;
      } else
      {
         echo "<h2>Problem deleting $prod_id</h2>\n";
         exit;
      }
   } else
   {
      $prod_id = $_POST['prod_id'];
      $cat_id = $_POST['cat_id'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];

      if (get_magic_quotes_gpc())
      {
         $description = stripslashes($description);
      }
      $description = mysql_real_escape_string($description);

      if (isset($_POST['onsale']))
         $onsale = 1;
      else
         $onsale = 0;

      $PictName = $_FILES['picture']['name'];

      if ($PictName)
      {
         $thumbnail = getThumb($_FILES['picture']);
         $thumbnail = mysql_real_escape_string($thumbnail);
         $query = "UPDATE products SET cat_id='$cat_id', description = '$description', " .
                 "price = $price, quantity = $quantity, onsale = $onsale, picture = '$thumbnail' " .
                 "WHERE prod_id = $prod_id";
      }
      else
      {
         $query = "UPDATE products SET cat_id='$cat_id', description = '$description', " .
                 "price = $price, quantity = $quantity, onsale = $onsale " .
                 "WHERE prod_id = $prod_id";
      }

      $result = mysql_query($query) or die(mysql_error());
      if ($result)
      {
         echo "<h2>Product information changed.</h2>\n";
      }
      else
      {
         echo "<h2>Sorry, I could not change the product information.</h2>\n";
      }
   }
?>