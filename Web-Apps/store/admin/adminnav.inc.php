
        <ul>
            <li>
              <h3>Store Administration</h3>
            </li>
            <li>
              <a href="admin.php"><strong>Home</strong></a>
            </li>
            <li></li>
        
<?php

   if (isset($_SESSION['store_admin']))
   {
      echo "<li>\n";
      echo "<form action=\"admin.php\" method=\"get\">\n";
      echo "<label><font color=\"#663300\"><br>Browse Products<br></font> </label>\n";
      echo "<select name=\"cat\">\n";

      $query="SELECT cat_id,name from categories";
      $result=mysql_query($query);
      while($row=mysql_fetch_array($result,MYSQL_ASSOC))
      {
          $cat_id = $row['cat_id'];
          $name = $row['name'];
          echo "<option value=\"$cat_id\">$name</option>";
      }

      echo "</select>\n";
      echo "<input name=\"goButton\" type=\"submit\" value=\"browse\" />\n";
      echo "<input name=\"content\" type=\"hidden\" value=\"editproducts\" />\n";
      echo "</form></li>\n";

      echo "<li bgcolor=\"#FFFF99\"><a href=\"admin.php?content=newproduct\"><strong>Add a new product</strong></a></li>\n";
      echo "<li><a href=\"admin.php?content=newcat\"><strong>Add a new category</strong></a></li>\n";
      echo "<li><a href=\"admin.php?content=process\"><strong>Process Pending Orders</strong></a></li>\n";
      echo "<li><a href=\"admin.php?content=outofstock\"><strong>List out-of-stock</strong></a></li>\n";
      echo "<li><a href=\"admin.php?content=report\"><strong>Generate report</strong></a></li>\n";
      echo "<li><a href=\"logout.php\"><strong>Log Out</strong></a></li>\n";
   }
?>
</ul>






