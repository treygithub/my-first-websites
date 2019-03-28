<?php

$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');

$recipeid = $_GET['id'];


$query = "SELECT title,poster,shortdesc,ingredients,directions from recipes where recipeid = $recipeid";


$result = mysql_query($query) or die('Could not find recipe');


$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved');


$title = $row['title'];


$poster = $row['poster'];


$shortdesc = $row['shortdesc'];


$ingredients = $row['ingredients'];


$directions = $row['directions'];


$ingredients = nl2br($ingredients);


$directions = nl2br($directions);


echo "<h2>$title</h2>\n";


echo "by $poster <br><br>\n";


echo $shortdesc . "<br><br>\n";


echo "<h3>Ingredients:</h3>\n";


echo $ingredients . "<br><br>\n";


echo "<h3>Directions:</h3>\n";


echo $directions . "\n";


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


   $totrecords = $row[0];


   echo "$totrecords comments posted\n";


   echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";


   echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";


   echo "<hr>\n";


   echo "<h2>Comments:</h2>\n";


   if (!isset($_GET['page']))


      $thispage = 1;


   else


      $thispage = $_GET['page'];


   $recordsperpage = 5;


   $offset = ($thispage - 1) * $recordsperpage;


   $totpages = ceil($totrecords / $recordsperpage);


   $query = "SELECT date,poster,comment from comments where recipeid = $recipeid order by commentid desc limit $offset,$recordsperpage";


   $result = mysql_query($query) or die('Could not retrieve comments: ' . mysql_error());


   while($row = mysql_fetch_array($result, MYSQL_ASSOC))


   {


       $date = $row['date'];


       $poster = $row['poster'];


       $comment = $row['comment'];


       $comment = nl2br($comment);


       echo $date . " - posted by " . $poster . "\n";


       echo "<br>\n";


       echo $comment . "\n";


       echo "<br><br>\n";


   }


   if ($thispage > 1)


   {


      $page = $thispage - 1;


      $prevpage = "<a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">Prev</a>";


   } else


   {


      $prevpage = "";


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


            $bar .= " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">$page</a> ";


         }


      }


   }


   if ($thispage < $totpages)


   {


      $page = $thispage + 1;


      $nextpage = " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">Next</a>";


   } else


   {


      $nextpage = "";


   }


   echo "GoTo: " . $prevpage . $bar . $nextpage;


}


?>