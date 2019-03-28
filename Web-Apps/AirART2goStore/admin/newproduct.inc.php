<?php
if (!isset($_SESSION['store_admin']))
{
   echo "<h2>Sorry, you have not logged into the system</h2>\n";
   echo "<a href=\"admin.php\">Please login</a>\n";
} else
{
   $user_id = $_SESSION['store_admin'];
   echo "<div class=\"container\">\n";
   echo "<form class=\"contact\" enctype=\"multipart/form-data\" action=\"admin.php\" method=\"post\">\n";

   echo "<fieldset>\n";
   echo "<h2>Enter the new product</h2><br>\n";
   echo "</fieldset>\n";

   echo "<fieldset>\n";
   echo "<h4 style=\"text-align:left\">Category</h4>\n";
   echo "</fieldset>\n";

   echo "<fieldset>\n";
   echo "<select name=\"cat\">\n";
   $query="SELECT cat_id,name from categories";
   $result=mysql_query($query);
   while($row=mysql_fetch_array($result,MYSQL_ASSOC))
   {
       $cat_id = $row['cat_id'];
       $name = $row['name'];
       echo "<option value=\"$cat_id\">$name</option>\n";
   }
   echo "</select>\n";
   echo "</fieldset><br>\n";

   echo "<fieldset>\n";
   echo "<input placeholder=\"Description\" type=\"text\" size=\"40\" name=\"description\">\n";
   echo "</fieldset>\n";

   echo "<fieldset>\n";
   echo "<input placeholder=\"Price\" type=\"text\" size=\"10\" name=\"price\"></td></tr>\n";
   echo "</fieldset>\n";

   echo "<fieldset>\n";
   echo "<input placeholder=\"Quantity in stock\" type=\"text\" size=\"10\" name=\"quantity\"></td</tr>\n";
   echo "</fieldset>\n";

   echo "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1024000\">\n";

   echo "<fieldset>\n";
   echo "<h4 style=\"text-align:left\">Upload Picture</h4>\n";
   echo "</fieldset>\n";

   echo "<fieldset>\n";
   echo "<input type=\"file\" name=\"picture\">\n";
   echo "</fieldset><br>\n";

   echo "<fieldset>\n";
   echo "<button id=\"contact-submit\" type=\"submit\" value=\"Submit\">SUBMIT</button>\n";
   echo "</fieldset>\n";

   echo "<input type=\"hidden\" name=\"content\" value=\"addproduct\">\n";
   echo "</form>\n";
   echo "</div>\n";
}
?>




