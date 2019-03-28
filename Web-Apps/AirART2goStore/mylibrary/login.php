<?php
function login()
{
$host_name = "db73";
$database = "db";
$user_name = "d";
$password = '';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');
mysql_select_db("db76", $con) or die('Sorry, could not connect to database');
}
?>