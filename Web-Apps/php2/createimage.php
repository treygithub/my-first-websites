<?php
$image = imagecreatetruecolor(80, 60);
/* First, you must allocate colors to use for drawing your objects */
$bc = imagecolorallocate($image, 255, 255, 255);
$fc = imagecolorallocate($image, 0, 0, 0);
/* Draw a solid rectangle between four specified points, filling it with a specified color. */
imagefilledrectangle($image, 0, 0, 80, 60, $bc);
/* The imagestring() function specifies a font size, followed by the X and Y coordinates of where you want the string to start, then the actual string, and finally, the color to use to draw the string. */
imagestring($image, 5, 20, 5, "No", $fc);
imagestring($image, 5, 10, 20, "Image", $fc);
imagestring($image, 5, 0, 35, "Available", $fc);
/* The imagejpeg() function takes your newly created image and either displays it on the Web page or, in our case, writes it to a file as a JPEG image. */
imagejpeg($image, "noimage.jpg");
/*the imagedestroy() function to free up the memory associated with our image.*/
imagedestroy($image);

echo "Image created";
?>
