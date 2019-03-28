

<?php

$userid = $_POST['userid'];


$password = $_POST['password'];


$query = "SELECT userid from users where userid = '$userid' and password = PASSWORD('$password')";


$result = mysql_query($query);


if (mysql_num_rows($result) == 0)


{


    echo "<h2>Sorry, your user account was not validated. Make sure you register first, and write down your login info! Retreving lost passwords is a pain.</h2><br>\n";


    echo "<a href=\"index.php?content=login\">Try again</a><br>\n";


    echo "<a href=\"index.php\">Return to Home</a>\n";


} else


{   

   $_SESSION['valid_recipe_user'] = $userid;


   echo "<h2>Welcome back to the Art Blog $userid . Your user account has been validated. You can now post questions, news articles and comments, Enjoy and have fun.</h2><br>\n";


   echo "<a href=\"index.php\">Return to Home</a>\n";


}


?>

