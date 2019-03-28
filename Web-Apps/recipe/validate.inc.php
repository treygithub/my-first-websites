<?php
$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');


$userid = $_POST['userid'];


$password = $_POST['password'];


$query = "SELECT userid from users where userid = '$userid' and password = PASSWORD('$password')";


$result = mysql_query($query);


if (mysql_num_rows($result) == 0)


{


    echo "<h2>Sorry, your user account was not validated. Make sure you register first, and write down your login info! I canot retreive a lost password!</h2><br>\n";


    echo "<a href=\"index.php?content=login\">Try again</a><br>\n";


    echo "<a href=\"index.php\">Return to Home</a>\n";


} else


{   

   $_SESSION['valid_recipe_user'] = $userid;


   echo "<h2>Welcome back to the Recipe Center. Your user account has been validated. You can now post recipes, news articles and comments, Bon appetit...</h2><br>\n";


   echo "<a href=\"index.php\">Return to Home</a>\n";


}


?>

