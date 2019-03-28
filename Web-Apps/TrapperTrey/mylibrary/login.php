<?php
$host_name = 'db733518387.db.1and1.com';
$database = 'db733518387';
$user_name = 'dbo733518387';
$password = 'ddfeeerer';

$con = mysql_connect($host_name, $user_name, $password, $database);
if (mysql_errno()) {
    die('<p>Failed to connect to MySQL: '.mysql_error().'</p>');
} else {
    mysql_select_db("db733518387", $con) or die('Sorry, could not connect to database');
}
?>