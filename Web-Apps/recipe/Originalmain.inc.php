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

/* After creating the connection and specifying a database, you'll need to create your SQL query. Then you'll assign the query to a PHP variable as a text string. Since we're not looking for specific recipes to display on the home page, we won't use a WHERE clause to restrict the returned rows. We will however use the ORDER BY clause with the DESC parameter, so recipes are listed as the most recent first. I also threw in the LIMIT clause so that the Web page only displays links for the last five posted recipes. */
$query = "SELECT recipeid,title,poster,shortdesc from recipes order by recipeid desc limit 0,5";

/* Once you create the query string, it's time to send it to the MySQL server. You do this with the mysql_query function: storing the query in the $results variable */
$result = mysql_query($query) or die('Sorry, could not get recipes at this time ');

/* The program uses the mysql_num_rows() PHP function to check how many rows of data the server will return from the query. If no rows are returned, then there's no data in the query result. */
if (mysql_num_rows($result) == 0)


{


   echo "<h3>Sorry, there are no recipes posted at this time, please try back later.</h3>";


} else


{

/* you need to perform another step to extract it. The mysql_fetch_array() function retrieves the result set from the query and places it into an array variable. This function uses two parameters: the variable that contains the result set information, and a constant value that defines how the array is referenced: Thus, The mysql_fetch_array function steps through the result set one record at a time each time the program calls it. When it reaches the end of the returned data, it produces a False value. This is a perfect scenario for using the while() function.We use the while() function to loop through all of the data records in the result set. When you've reached the end of the result set, the mysql_fetch_array function returns a False value, which ends the while loop. */

   while($row=mysql_fetch_array($result, MYSQL_ASSOC))


   {

/* Thus, the variable $row['recipeid'] contains the value of the recipeid data field for the record. Within the loop, each data field from the record is assigned to a PHP variable (this isn't required, but it helps make handling data easier within the program). Each PHP variable is named according to the data field value it holds.*/
       $recipeid = $row['recipeid'];


       $title = $row['title'];


       $poster = $row['poster'];


       $shortdesc = $row['shortdesc'];


       /*The first echo statement creates an HTML link tag on the Web page. It uses the content HTML variable from the index.php page to point to the showrecipe.inc.php page as the next page to display in the main cell. It also adds an HTML variable called id, which points to the recipeid value of the data record. This trick allows us to pass the recipeid value to the showrecipe Web page. It uses the title value of the data record as the actual link text.

        The first echo statement also displays the poster value in the data record to identify who posted the recipe. The second echo statement displays the shortdesc value of the data record, so a brief description appears under the HTML link.

        The while() loop that contains the echo statements iterates through the data records until the mysql_fetch_array function returns a False value, displaying the information within the main section of the index.php Web page. If visitors click any of these links, they are taken to the showrecipe.inc.php page */


       echo " <b>Title:</b> <a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a><br><b>Submitted by:</b> $poster<br>\n";


       echo"<b>Discription:</b> $shortdesc<br><br>\n";

   }


}

echo "</div><br><br>\n";
?>