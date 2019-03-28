<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mystyle.css" />
<link rel="stylesheet" type="text/css" href="css/form.css">
<title>The Food Store</title>
</head>
<?php

   include("../recipestore/mylibrary/login.php");
   include("../recipestore/mylibrary/showproducts.php");

   login();
?>
<body>
<header>
<?php include("../recipestore/includes/header.inc.php"); ?>
</header>
<main>
<nav>
<?php include("nav.inc.php"); ?>
</nav>
<section>
  <?php
             if (!isset($_REQUEST['content']))
                include("main.inc.php");
             else
             {
                $content = $_REQUEST['content'];
                $nextpage = $content . ".inc.php";
                include($nextpage);
             }
           ?>
</section>
<aside>
<?php include("cart.inc.php"); ?>
</aside>
</main>
<footer>
  <?php include("../recipestore/includes/footer.inc.php"); ?>
</footer>
</body>
</html>