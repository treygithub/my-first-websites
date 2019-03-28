<?php
$host_name = 'db720661448.db.1and1.com';
$database = 'db720661448';
$user_name = 'dbo720661448';
$password = 'Trey1&1snake!!';

$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db720661448", $con) or die('Sorry, could not connect to database');

$password = $_POST['password'];
/*
$hashFormat = "$2y$10$";
$salt = "iusesomecrazystrings22";
$hashF_and_salt = $hashFormat . $salt;
$password = crypt($password,$hashF_and_salt);
*/ 
$query = "SELECT password from frontdoor where password = PASSWORD('$password')";

$result = mysql_query($query);

if (mysql_num_rows($result) == 0)

{
    echo"<div id=\"content\" class=\"cantainer\">\n";
    echo "<h2 id=\"beer\" class=\"btn\">ACCESS DENIED!</h2><br>\n";

    echo "<a href=\"login.inc.php?content=login\" id=\"beer\" class=\"btn\">Try again</a><br>\n";

}else{
    echo  "<a href=\"main.inc.php?content=login\" id=\"beer\" class=\"btn\">Begin Your Quest Here</a><br>\n";
}
?>

