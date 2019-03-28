<!-- Check me out, I'm Getting my SoloLearn On! This code generates a randum number between 1-100, and using an if then else statment, to test if my (Condition) is true or flase, then the program excutes my statemnets and echo the outcome! For this example we have a randum sale price * tax + shipping and shipping vary based on total price = total-->
<html>
<body>
<h1>Random number test if then else elseif</h1>
<?php
    $price = rand(1, 100);
    if ($price >= 50)
{
      $tax = $price * .07;
      $shipping = 8;
      $total = $price + $tax + $shipping;
       echo "<h2>Randum Generated Purchse Prices is: \$ $price</h2><br> \n";
       echo "<h2>The Order Is Being Porcessed As:<br>Iteam Price: \$ $price <br> Sales Tax: \$ $tax <br> Shipping: \$ $shipping</h2><br>\n";
      echo "<h2>The Order Total Is: \$ $total</h2><br>\n";
}elseif ($price > 25){
    $tax = $price * .07;
      $shipping = 6;
      $total = $price + $tax + $shipping;
       echo "<h2>Randum Generated Purchse Prices is: \$ $price</h2><br> \n";
       echo "<h2>The Order Is Being Porcessed As:<br>Iteam Price: \$ $price <br> Sales Tax: \$ $tax <br> Shipping: \$ $shipping</h2><br>\n";
      echo "<h2>The Order Total Is: \$ $total</h2><br>\n";
}else{
    $tax = $price * .07;
      $shipping = 4;
      $total = $price + $tax + $shipping;
      echo "<h2>Randum Generated Purchse Prices is: \$ $price</h2><br> \n";
      echo "<h2>The Order Is Being Porcessed As:<br>Iteam Price: \$ $price <br> Sales Tax: \$ $tax <br> Shipping: \$ $shipping</h2><br>\n";
      echo "<h2>The Order Total Is: \$ $total</h2><br>\n";
}
?>
</body>
</html>