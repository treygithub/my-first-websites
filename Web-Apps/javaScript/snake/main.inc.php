
<?php

echo "<!DOCTYPE html>";
echo"<html lang=\"en\">";

echo"<head>";
    echo"<meta charset=\"UTF-8\">";
    echo"<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    echo"<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">";
    echo"<title>Snake Game</title>";
    echo"<link rel=\"stylesheet\" href=\"css/style.css\" type=\"text/css\">";
echo"</head>";

echo"<body>";
    echo"<div class=\"container\">";
        echo"<div id=\"overlay\">
            Your Final Score: <span id=\"final_score\"></span>";
            echo"<br>";
            echo"<a onclick=\"window.location.reload()\" href=\"#\">Click To Play Again</a>";
        echo"</div>";
        echo"<canvas id=\"canvas\" width=\"600\" height=\"400\">
           Sorry your browser does not support canvas = No snake for you :(";
       echo"</canvas>";

        echo"<div id=\"stats\">";
            echo"<div id=\"score\"></div>";
            echo"<div id=\"high_score\"></div>";
            echo"<button onclick=\"resetScore()\" id=\"reset_score\">Reset High Score</button>";
        echo"</div>";
    echo"</div>";
    
    echo"<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js\" type=\"text/javascript\"></script>";
    echo"<script src=\"Script/script.js\"></script>";
echo"</body>";

echo"</html>";
?>