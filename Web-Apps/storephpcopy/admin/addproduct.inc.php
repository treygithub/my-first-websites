<?php

   $cat_id=$_POST['cat'];
   $description=$_POST['description'];
   $price=$_POST['price'];
   $quantity=$_POST['quantity'];

   if (get_magic_quotes_gpc())
   {
      $cat_id = stripslashes($cat_id);
      $description = stripslashes($description);
      $price = stripslashes($price);
      $quantity = stripslashes($quantity);
   }
   $cat_id = mysql_real_escape_string($cat_id);
   $description = mysql_real_escape_string($description);
   $price = mysql_real_escape_string($price);
   $quantity = mysql_real_escape_string($quantity);

   $thumbnail = getThumb($_FILES['picture']);
   $thumbnail = mysql_real_escape_string($thumbnail);

   $query = "INSERT INTO products (cat_id, description, picture, price, quantity) " .
            " VALUES ('$cat_id','$description','$thumbnail', '$price', '$quantity')";

   $result = mysql_query($query) or die('Unable to add product');
   if ($result)
      echo "<h2>New product added</h2>\n";
   else
      echo "<h2>Problem adding new product</h2>\n";
?> 




