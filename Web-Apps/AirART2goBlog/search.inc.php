<?php
   $search = $_GET['searchFor'];
   if (get_magic_quotes_gpc())
   {
      $search = stripslashes($search);
   }
   $searchsql = mysql_real_escape_string($search);

   echo "<h2>Results of searching '$search'<br><br></h2>\n";
   $query = "SELECT * from recipes WHERE directions REGEXP '$searchsql'";
   $result = mysql_query($query);
   if (!$result)
   {
      echo "<h2>Sorry, unable to process search string.</h2>\n";
   } else


    {


        while($row=mysql_fetch_array($result, MYSQL_ASSOC))


        {


            $recipeid = $row['recipeid'];


            $title = $row['title'];


            $shortdesc = $row['shortdesc'];

/* The first echo statement creates a link passing the showrecipe include file name and the recipeid data value. The link uses the title of the recipe as the text. When a Web page visitor clicks the link, the code calls the index.php program using the showrecipe include file in the main cell area, which displays the recipe text. */
            echo "Recipe Title: ";
            echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a><br>\n";

            echo "Short Discription: ";
            echo "$shortdesc<br><br>\n";

        }


    }


?>