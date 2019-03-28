<h3 class="shownews">Post News articles</h3>
<p id="subh">Latest Art / Charity News Blog</p>
<?php
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
