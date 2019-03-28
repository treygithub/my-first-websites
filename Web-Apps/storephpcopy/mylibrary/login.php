<?php
function login()
{
$host_name = 'localhost';
$database = 'store';
$user_name = 'root';
$password = '';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');
mysql_select_db("store", $con) or die('Sorry, could not connect to database');
}
?>