<?php
session_start();

include ("../mylibrary/login.php");
login();

$user_id = $_POST['user_id'];
$password = $_POST['password'];

$query = "SELECT user_id, name from admins where user_id = '$user_id' and password = PASSWORD('$password')";
$result = mysql_query($query);

if (mysql_num_rows($result) == 0)
{
   echo "<h2>Sorry, your account was not validated.</h2><br>\n";
   echo "<a href=\"admin.php\">Try again</a><br>\n";
} else
{
   $_SESSION['store_admin'] = $user_id;
   header("Location: admin.php");
}
?>




