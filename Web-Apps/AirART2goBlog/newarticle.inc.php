<?php


if (!isset($_SESSION['valid_recipe_user']))


{


    echo "<h2>Sorry, you must be registered to post news articles</h2><br>\n";


    echo "<a href=\"index.php?content=login\">Please login or register to post</a><br>\n";


    echo "<a href=\"index.php?content=shownews&id=$newsid\">Go back to news</a>\n";


} else{

$userid = $_SESSION['valid_recipe_user'];

echo "<div class=\"container\">\n";

echo "<form class=\"contact\" action=\"index.php\" method=\"post\">\n";

echo "<h3 style=text-align:left>Post A New Article</h3>";

echo "<input placeholder=\"Title of Article goes here...\" type=\"text\" name=\"title\"><br>\n";

echo "<textarea placeholder=\" Body of Article goes here\" rows=\"10\" cols=\"50\" name=\"article\"></textarea><br>\n";

 echo "<input type=\"hidden\" name=\"poster\" value=\"$userid\"><br>\n";

echo "<input type=\"hidden\" name=\"newsid\" value=\"$newsid\">\n";


echo "<input type=\"hidden\" name=\"content\" value=\"addarticle\">\n";


echo "<br><button type=\"submit\" value=\"Submit\">SUBMIT ARTICLE</button>\n";


echo "</form>\n";
echo "</div>\n";
}

?>