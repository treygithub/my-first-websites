<?php
/* to read the image file into a PHP variable */
$image = file_get_contents("test.jpeg");
/* converts the contents of the variable into a new image we can manipulate. */
$source = imagecreatefromstring($image);
/* width of the image */
$width = imagesx($source);
/* height of the image */
$height = imagesy($source);
/* The next step is to create our new image that's the size we want */
$thumb = imagecreatetruecolor(80, 60);
/* copy the original image to the new image using the new image size.You must specify the destination image, source image, starting X and Y locations in the destination and source, and the width and height of the destination and source. To make our thumbnail image, we specify the destination width and height as 80 x 60. */
imagecopyresampled($thumb, $source, 0, 0, 0, 0, 80, 60, $width, $height);
/*function to convert the image to JPEG format and store it in a file called newthumb.jpg. */
imagejpeg($thumb, "newthumb.jpg");

echo "image created";
?>

