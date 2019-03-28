<?php

   if (!isset($_SESSION['store_admin']))
   {
      echo "<h2>Sorry, you have not logged into the system</h2>\n";
      echo "<a href=\"admin.php\">Please login</a>\n";
   } else
   {
      echo "<div class=\"container\">";
      echo "<h2>Add a new food category</h2>\n";
      echo "<form class=\"contact\" action=\"admin.php\" method=\"post\">\n";
      echo "<fieldset>";
      echo "<input placeholder=\"New Category\" type=\"text\" name=\"catname\"\n";
      echo "<fieldset>";
      echo "<input type=\"hidden\" name=\"content\" value=\"addcat\">\n";
      echo "<fieldset>";
      echo "<button id=\"contact-submit\" type=\"submit\" value=\"Submit\">SUBMIT</button>\n";
      echo "</fieldset>";
      echo "</form>\n";
      echo "</div>";
   }
?>