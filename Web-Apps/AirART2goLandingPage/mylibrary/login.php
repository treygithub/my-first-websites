

<?php
function login()
{
$host_name = 'db733534341817';
$database = 'db73343433518177';
$user_name = 'dbo73351834534177';
$password = '555555555';
$connect = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');
mysql_select_db('db73351345344348177',$connect) or die('Sorry, could not connect to database');
}
?>