<?php
   function showproducts($cat_id, $page, $currentpage, $newpage)
   {
      $query = "Select count(prod_id) from products where cat_id = $cat_id";
      $result = mysql_query($query);
      $row = mysql_fetch_array($result);
      if ($row[0] == 0)
      {
         echo "<h2><br>Sorry, there are no products in this category</h2>\n";
      }
      else
      {
         $thispage = $page;
         $totrecords = $row[0];
         $recordsperpage = 5;
         $offset = ($thispage - 1) * $recordsperpage;
         $totpages = ceil($totrecords / $recordsperpage);
         echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
         echo "<tr><td><h2>Image</h2></td>\n";
         echo "<td><h2>Product</h2></td>\n";
         echo "<td><h2>Price</h2></td>\n";
         echo "<td><h2>Quantity in Stock</h2></td>\n";
         echo "<td><h2>Special</h2></td></tr>\n";

         $query = "SELECT * from products WHERE cat_id=$cat_id LIMIT $offset,$recordsperpage";
         $result = mysql_query($query);
         while($row=mysql_fetch_array($result, MYSQL_ASSOC))
         {
            $prod_id = $row['prod_id'];
            $description = $row['description'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $onsale = $row['onsale'];
 
            echo "<tr><td>\n";
               echo "<img src=\"showimage.php?id=$prod_id\" width=\"80\" height=\"60\">";
            echo "</td><td>\n";
               echo "<a href=\"$newpage&id=$prod_id\">$description\n";
            echo "</td><td>\n";
               echo "$" . $price . "\n";
            echo "</td><td>\n";
               echo $quantity . "\n";
            echo "</td><td>\n";
            if ($onsale)
               echo "On sale!\n";
            else
               echo "&nbsp;\n";
            echo "</td></tr>\n";
         }
         echo "</table>\n";

   // Code to implement paging
         if ($thispage > 1)
         {
            $page = $thispage - 1;
            $prevpage = "<a href=\"$currentpage&cat=$cat_id&page=$page\">Previous page</a>";
         } else
         {
            $prevpage = " ";
         }

         if ($thispage < $totpages)
         {
            $page = $thispage + 1;
            $nextpage = " <a href=\"$currentpage&cat=$cat_id&page=$page\">Next page</a>";
         } else
         {
            $nextpage = " ";
         }

         if ($totpages > 1)
            echo $prevpage . "  " . $nextpage;

      }
   }
?>