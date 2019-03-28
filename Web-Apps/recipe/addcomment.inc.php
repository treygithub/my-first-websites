<?php

/* retrieving the form data using the $_POST[] array variable (and checks the comment field for HTML code). */

$recipeid = $_POST['recipeid'];


$poster = addslashes($_POST['poster']);

$comment = addslashes(htmlspecialchars($_POST['comment']));

/*  PHP date() function to obtain the current date and time from the system */

$date = date("Y-m-d");

/* standard code to connect to the MySQL server, select the recipe database, then build and send the INSERT SQL statement to the server. */
$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';

$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');

$query = "INSERT INTO comments (recipeid, poster, date, comment) " .


          " VALUES ('$recipeid', '$poster', '$date', '$comment')";


$result = mysql_query($query);


if ($result)


   echo "<h2>Comment posted</h2>\n";



else


   echo "<h2>Sorry, there was a problem posting your comment</h2>\n";


echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">Return to recipe</a>\n";


?>