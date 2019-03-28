<h3 class="shownews">What's Cookin?</h3>
<p id="subh">Latest Cooking News Blog</p>
<?php
$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');

$query = "SELECT title, date, poster, article from news order by date desc limit 0,2";

$result = mysql_query($query) or die('Sorry, could not find article requested');

if (mysql_num_rows($result) == 0)

{

   echo "<h3>Sorry, there are no articles posted at this time, please try back later.</h3>";

} else

{
   while($row=mysql_fetch_array($result, MYSQL_ASSOC))
   {
    $date = $row['date'];

    $poster = $row['poster'];

    $title = $row['title'];

    $article = $row['article'];

    $article = nl2br($article);

    echo "Date:$date<br>Posted By: $poster<br> Title: <a href=\"index.php?content=shownews&id=$newsid\">$title</a><br>$article<br><br>\n";
   }

}

?>
