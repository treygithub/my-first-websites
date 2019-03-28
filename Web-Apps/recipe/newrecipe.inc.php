<?php
if (!isset($_SESSION['valid_recipe_user']))


{


    echo "<h2>Sorry, you must be registered to post new recipes</h2><br>\n";


    echo "<a href=\"index.php?content=login\">Please login or register to post</a><br>\n";


    echo "<a href=\"index.php?content=main\">Go back to recipe</a>\n";


} else{

$userid = $_SESSION['valid_recipe_user'];

echo"<div class=\"container\">\n";
echo"<form action=\"index.php\" method=\"post\" class=\"contact\">\n";


echo"<h3 style=text-align:left>Join The Fun... Enter A New Family Recipe</h3>\n";

echo"<fieldset>\n";
echo"<input placeholder=\"Title goes here...\" type=\"text\" size=\"40\" name=\"title\" required><br>\n";
echo"</fieldset>\n";

echo"<fieldset>\n";
echo"<textarea placeholder=\" Type Short Description here...\" rows=\"5\" cols=\"50\" name=\"shortdesc\" required></textarea><br>\n";
echo"</fieldset>\n";

echo "<fieldset>\n";
echo "Ingredients (one item per line)\n";
echo"<textarea placeholder=\" Type your Ingredients Here\" rows=\"10\" cols=\"50\" name=\"ingredients\" required></textarea><br>\n";
echo"</fieldset>\n";

echo"<fieldset>\n";
echo "Directions (one direction per line)\n";
echo"<textarea placeholder=\"Type your Directions Here...\"  rows=\"10\" cols=\"50\" name=\"directions\" required></textarea><br>\n";
echo"</fieldset>\n";


echo "<input type=\"hidden\" name=\"recipeid\" value=\"$recipeid\">\n";
echo "<input type=\"hidden\" name=\"poster\" value=\"$userid\"><br>\n";
echo "<input type=\"hidden\" name=\"content\" value=\"addrecipe\"></b>\n";
echo"<fieldset>\n";
echo"<button type=\"submit\" value=\"Submit\">SUBMIT RECIPE</button>\n";
echo"</fieldset>\n";


echo"</form>\n";
echo"</div>\n";
}
?>