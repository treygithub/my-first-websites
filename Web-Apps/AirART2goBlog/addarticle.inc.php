<?php

/* retrieving the form data using the $_POST[] array variable (and checks the comment field for HTML code). */

$poster = addslashes($_POST['poster']);

$title = addslashes(htmlspecialchars($_POST['title']));

$article = addslashes(htmlspecialchars($_POST['article']));

/*  PHP date() function to obtain the current date and time from the system */

$date = date("Y-m-d");


$query = "INSERT INTO news (date, poster, title, article) " .


          " VALUES ('$date','$poster', '$title', '$article')";


$result = mysql_query($query);


if ($result)


   echo "<h2>New's Article Posted</h2>\n";


else


   echo "<h2>Sorry, there was a problem posting your article</h2>\n";


echo "<a href=\"index.php?content=shownews&id=$newsid\">Return to News Archive Section</a>\n";


?>