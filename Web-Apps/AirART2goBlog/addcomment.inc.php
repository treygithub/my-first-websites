<?php

/* retrieving the form data using the $_POST[] array variable (and checks the comment field for HTML code). */

$recipeid = $_POST['recipeid'];


$poster = addslashes($_POST['poster']);

$comment = addslashes(htmlspecialchars($_POST['comment']));

/*  PHP date() function to obtain the current date and time from the system */

$date = date("Y-m-d");


$query = "INSERT INTO comments (recipeid, poster, date, comment) " .


          " VALUES ('$recipeid', '$poster', '$date', '$comment')";


$result = mysql_query($query);


if ($result)


   echo "<h2>Comment posted!</h2>\n";



else


   echo "<h2>Sorry, there was a problem posting your comment</h2>\n";


echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">Return to blog</a>\n";


?>