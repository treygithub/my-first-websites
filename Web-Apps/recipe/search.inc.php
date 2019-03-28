<?php

$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');

/* retrieves the search phrase the visitor entered into the search textbox from the HTML variable and assigns it to the $search PHP variable. */
    $search = addslashes($_GET['searchFor']);

/* The code explodes the search phrase and then implodes it using the LIKE condition text. */
    $words = explode(" ", $search);

    /* This would queery only one data field
    $phrase = implode("%' AND title LIKE '%", $words);


    $query = "SELECT recipeid,title,shortdesc from recipes where title like '%$phrase%'";*/

   /* search for the search terms in more than one data field at the same time. One method is to use a technique called a full text search: the SELECT statement will return data records that have the search words either in the title data field, OR the ingredients data field (but it won't work if the search words are split between the two data fields). That way you only have to retrieve data from one result set.*/

$phrase_title = implode("%' AND title LIKE '%", $words);
$phrase_ingredients = implode("%' AND ingredients LIKE '%", $words);
$query = "SELECT recipeid,title,shortdesc from recipes where title like '%$phrase_title%' OR ingredients LIKE '%$phrase_ingredients%'";


    $result = mysql_query($query) or die('Could not query database at this time');
    echo "<h1 id=\"h11\">Search Results</h1><br><br>\n";

/* Inside the while() loop, the program first assigns the retrieved data fields to PHP variables, and then it uses those variables to create a simple link for each recipe: */
    if (mysql_num_rows($result) == 0)


    {


        echo "<h2>Sorry, no recipes were found with '$search' in them.</h2>";


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