<?php

$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');

/* This function retrieves the value of the id HTML variable that the main.inc.php program passes within the URL. It then assigns the value to the PHP variable $recipeid. */
$recipeid = $_GET['id'];

/* This query uses the WHERE clause to return only the data record with a recipeid data field equal to the recipeid value specified in the HTML link variable. This ensures that we'll only retrieve the data for the specific data record in the table. */
$query = "SELECT title,poster,shortdesc,ingredients,directions from recipes where recipeid = $recipeid";


$result = mysql_query($query) or die('Sorry, could not find recipe requested');

$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved');


$title = $row['title'];

$poster = $row['poster'];

$shortdesc = $row['shortdesc'];

$ingredients = $row['ingredients'];

$directions = $row['directions'];

/* nl2br() function. This function converts any newline characters (carriage returns) in the string to <br> HTML tags. The client's browser will interpret the <br> tags as carriage returns and properly format the data for us. Neat! */

$ingredients = nl2br($ingredients);

$directions = nl2br($directions);


echo "<h2>$title</h2>\n";

echo "by $poster <br><br>\n";

echo "$shortdesc<br><br>\n";

echo "<h3>Ingredients:</h3>\n";

echo "$ingredients<br><br>\n";

echo "<h3>Directions:</h3>\n";

echo "$directions";

echo "<br><br>\n";

$query = "SELECT count(commentid) from comments where recipeid = $recipeid";

$result = mysql_query($query);

$row=mysql_fetch_array($result);

if ($row[0] == 0)

{

   echo "No comments posted yet.&nbsp;&nbsp;\n";

   echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";

   echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";

   echo "<hr>\n";

} else


{

   echo $row[0] . "\n";

   echo "&nbsp;comments posted.&nbsp;&nbsp;\n";

   echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";

   echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";

   echo "<hr>\n";

   echo "<h2>Comments:</h2>\n";

   $query = "SELECT date,poster,comment from comments where recipeid = $recipeid order by commentid desc";

   $result = mysql_query($query) or die('Could not retrieve comments');

   while($row = mysql_fetch_array($result, MYSQL_ASSOC))

   {


       $date = $row['date'];


       $poster = $row['poster'];


       $comment = $row['comment'];


       $comment = nl2br($comment);


       echo "$date  - posted by  $poster<br>\n";


       echo "$comment\n";


       echo "<br><br>\n";

   }


}
?>
