<?php

/* retrieving the form data using the $_POST[] array variable (and checks the comment field for HTML code). */

$poster = addslashes($_POST['poster']);

$title = addslashes($_POST['title']);

$article = addslashes(htmlspecialchars($_POST['article']));

/*  PHP date() function to obtain the current date and time from the system */

$date = date("Y-m-d");

/* standard code to connect to the MySQL server, select the recipe database, then build and send the INSERT SQL statement to the server. */

$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';

$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');


$query = "INSERT INTO news (date, poster, title, article) " .


          " VALUES ('$date','$poster', '$title', '$article')";


$result = mysql_query($query);


if ($result)


   echo "<h2>New's Article Posted</h2>\n";


else


   echo "<h2>Sorry, there was a problem posting your article</h2>\n";


echo "<a href=\"index.php?content=shownews&id=$newsid\">Return to News Archive Section</a>\n";


?>