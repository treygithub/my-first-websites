<?php
function login(){
$host_name = 'db735142345454';
$database = 'db7354345142963';
$user_name = 'dbo7545435142963';
$password = '00000000000';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db735343434142963", $con) or die('Sorry, could not connect to database');
}
?>