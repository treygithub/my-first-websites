<ul>
    <li><h2>Welcome to the store</h2></li>
    <li><a href="index.php"><strong>Home</strong></a></li>
    <li><a href="index.php?content=aboutus"><strong>About Us</strong></a></li>
    <li><a href="index.php?content=newsletter"><strong>News Letter</strong></a></li>
      <?php echo "<li>\n";
      echo "<form action=\"index.php\" method=\"get\">\n";
      echo "<label><font color=\"#663300\"><br>Browse Categories<br></font> </label>\n";
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
      echo "<input name=\"content\" type=\"hidden\" value=\"buyproducts\" />\n";
      echo "</form></li>\n";
      ?>
    <li>
<form action="index.php" method="get">
    <label><font color="#663300"><br>Search for product</font><br></label>
      <input name="searchFor" type="text" size="14" />
      <input name="goButton" type="submit" value="find" />
      <input name="content" type="hidden" value="search" />
  </form>
  </li>
    <li><a href="index.php?content=reviewcart"><strong>Review shopping cart</strong></a></li>
 
    <li bgcolor=#FFFF99><a href="index.php?content=checkout"><strong>Check out</strong></a></li>
    <li><a href="index.php?content=contact"><strong>Contact Us</strong></a></li>
    <li><a href="https://www.hunecut.com"><strong>Recipe Center</strong></a></li>
</ul>