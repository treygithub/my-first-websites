<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Area Calculator</title>
</head>
<body>
    <h1>PHP Area Calculator</h1>
    <?php
    $width = rand(1,50);
    $height = rand(1,50);
    $area = "$width * $height";
    $answer = $width * $height;
    echo "<h3>Area of a square is Width times Height: $area</h3><br />\n";
    echo "<h3>The sum of this square is: $answer</h3> \n";
    ?>
</body>
</html>