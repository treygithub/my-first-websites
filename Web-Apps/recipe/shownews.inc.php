<div>
    <h1 id="shownews" align="center"><span style=color:red>Hot</span> Off The Press!</h1>
<h4 align="center">Last 10 Articles Displayed by Date</h4>
</div>
<?php

$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');


$newsid = $_GET['id'];


$query = "SELECT date, poster, title, article FROM news order by date desc limit 0,10";


$result = mysql_query($query) or die('Sorry, could not find article requested');




while($row = mysql_fetch_array($result, MYSQL_ASSOC))


   {


$date = $row['date'];

$poster = $row['poster'];

$title = $row['title'];

$article = $row['article'];

$article = nl2br($article);

echo " $date <br>\n";

echo "Posted By: $poster<br>\n";

echo "<h2>$title</h2>\n";

echo "$article<br><br>\n";

}

echo "<br><br><a href=\"index.php?content=newarticle&id=$newsid\">Post A New's Article</a>\n";
