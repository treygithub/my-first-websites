<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Image Test</title>
<body>
<?php
include("mylibrary/login.php");
login();

$query = "SELECT prod_id, description FROM products";
$result = mysql_query($query) or die(mysql_error());

echo "<table width=\"50%\" cellpadding=\"1\" border=\"1\">\n";
echo "<tr><td>Product ID</td><td>Description</td><td>Image</td></tr>\n";
while($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
   $prod_id = $row['prod_id'];
   $description = $row['description'];

   echo "<tr><td>$prod_id</td><td>$description</td>\n";
   echo "<td><img src=\"showimage.php?id=$prod_id\" width=\"250\" height=\"267\"></td></tr>\n";
}
echo "</table>\n";
?>
</body>
</html>