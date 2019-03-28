<!-- First we retrieve all of the HTML variables from the form Web page. Since the <form> tag in the newrecipe.inc.php file uses the POST method, we need to use the $_POST[] PHP array variable to assign the values from each HTML variable to the PHP variables. -->
<?php

$recipeid = $_POST['recipeid'];
$title = addslashes($_POST['title']);
$poster = addslashes($_POST['poster']);
$shortdesc = addslashes($_POST['shortdesc']);

/*When you have data that contains single quotes, the INSERT statement gets confused, because it uses single quotes as well to define the start and end of the string values. This will cause the MySQL server to reject the INSERT statement.
To solve this problem PHP provides the addslashes() function, which adds a backslash character to any quotes in the data. The backslash tells the MySQL server that the quote is part of the data and not part of the string delimiter.*/

/* The htmlspecialchars() function converts HTML code characters into text values that the Web browser will display but not interpret as HTML code. This prevents visitors from entering HTML code within the text areas. */

$ingredients = addslashes(htmlspecialchars($_POST['ingredients']));
$directions = addslashes(htmlspecialchars($_POST['directions']));


/* The trim() PHP function removes any leading or trailing spaces from a string value. If the string is empty, this leaves nothing in the string. There is also an ltrim() function, which only removes leading spaces, and an rtrim() function which only removes trailing spaces. */

/* After the trim() function removes the leading and trailing spaces, an if-then statement is used to check whether there's anything leftover in the string. If the string is empty, that means the visitor didn't enter any data into the input field. The program then displays a message indicating that the visitor must enter a data value in the Poster field. 


if (trim($poster) == "")


{


    echo "<h2>Sorry, each recipe must have a poster</h2>\n";


}else


{*/



/* standard code to connect to the MySQL server, select the recipe database, then build and send the INSERT SQL statement to the server. */
$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';

 $con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

 mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');

/* query sent to server / database */

    $query = "INSERT INTO recipes (title, shortdesc, poster, ingredients, directions) " .


          " VALUES ('$title', '$shortdesc', '$poster', '$ingredients', '$directions')";

/* $query results are stored into $results variable */
    $result = mysql_query($query) or die('Sorry, we could not post your recipe to the database at this time');

/*  the program checks the $result value to determine if the INSERT command was successful. And returns a Boolean value, if true Recipe posted, if false then sorry not posted */

    if ($result)


       echo "<h2>Recipe posted</h2>\n";



    else


       echo "<h2>Sorry, there was a problem posting your recipe</h2>\n";

        echo "<a href=\"index.php?content=main&id=$recipeid\">Return to recipe</a>\n";




?>