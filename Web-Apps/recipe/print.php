<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<link rel="stylesheet" type="text/css" href="print.css" />


<title>The Recipe Center</title>


</head>


<body>


<?php


$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');


mysql_select_db("db718616938", $con) or die('Could not connect to database');


$recipeid = $_GET['id'];


$query = "SELECT title,poster,shortdesc,ingredients,directions from recipes where recipeid = $recipeid";


$result = mysql_query($query) or die('Could not find recipe');


$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved');


$title = $row['title'];


$poster = $row['poster'];


$shortdesc = $row['shortdesc'];


$ingredients = $row['ingredients'];


$directions = $row['directions'];


$ingredients = nl2br($ingredients);


$directions = nl2br($directions);


echo "<h2>$title</h2>\n";


echo "posted by $poster <br>\n";


echo $shortdesc . "\n";


echo "<h3>Ingredients:</h3>\n";


echo $ingredients . "<br>\n";


echo "<h3>Directions:</h3>\n";


echo $directions . "\n";


?>


</body>


</html>