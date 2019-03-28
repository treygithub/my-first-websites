<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="Art for sale">
<meta name="keywords" content="Art, Artist, art for sale, Charity, store, online store, buy art">
<meta name="Trey H." content="NewJack Web Devlopment">
<link rel="stylesheet" type="text/css" href="css/mystyle.css" />
<link rel="stylesheet" type="text/css" href="css/form.css">
<title>Art gallery</title>
</head>
<?php
   include("mylibrary/login.php");
   include("mylibrary/showproducts.php");

   login();
?>

<body>
<header>
<?php include("includes/header.inc.php"); ?>

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

</aside>
</main>
<footer>
  <?php include("includes/footer.inc.php"); ?>
</footer>
</body>
</html>