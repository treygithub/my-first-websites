<!-- The main.inc.php program generates a Web page that displays a list of the last five recipes in the database along with an HTML link for each recipe. -->
<h1 id="mh">The Latest Family Recipes</h1>

<?php
echo "<div id=\"m11\"><br>\n";
/*The three parameters specified are the hostname of the MySQL server, the userid used to log into the server, and the password required for the userid. The result of the mysql_connect function is assigned to a PHP variable called $con.*/

$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

/* Use the mysql_select_db function to specify the database name, along with the PHP variable representing the opened connection.  */

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');


$query = "SELECT count(recipeid) FROM recipes";
$result = mysql_query($query);

$row = mysql_fetch_array($result);
if ($row[0] == 0)
{
   echo "<h3>Sorry, there are no recipes posted at this time, please try back later.</h3>";
} else
{
   $totrecords = $row[0];

   if (!isset($_GET['page']))
      $thispage = 1;
   else
      $thispage = $_GET['page'];

   $recordsperpage = 5;
   $offset = ($thispage - 1) * $recordsperpage;
   $totpages = ceil($totrecords / $recordsperpage);

   $query = "SELECT recipeid,title,poster,shortdesc from recipes order by recipeid desc limit $offset, $recordsperpage";
   $result = mysql_query($query) or die('Could not get recipies: ' . mysql_error());

   While($row=mysql_fetch_array($result, MYSQL_ASSOC))
   {
       $recipeid = $row['recipeid'];
       $title = $row['title'];
       $poster = $row['poster'];
       $shortdesc = $row['shortdesc'];
       echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title\n</a><br>Submitted by: $poster<br>\n";
       echo"Short Discription: $shortdesc<br><br>\n";
   }

   if ($thispage > 1)
   {
      $page = $thispage - 1;
      $prevpage = "<a href=\"index.php?page=$page\">Prev</a>";
   } else
   {
      $prevpage = " ";
   }


   $bar = '';
   if ($totpages > 1)
   {
      for($page = 1; $page <= $totpages; $page++)
      {
         if ($page == $thispage)
         {
            $bar .= " $page ";
         } else
         {
            $bar .= " <a href=\"index.php?page=$page\">$page</a> ";
         }
      }
   }

   if ($thispage < $totpages)
   {
      $page = $thispage + 1;
      $nextpage = " <a href=\"index.php?page=$page\">Next</a>";
   } else
   {
      $nextpage = " ";
   }

   if ($totpages > 1)
      echo "GoTo: " . $prevpage . $bar . $nextpage;
}
echo "</div><br><br>\n";
?>