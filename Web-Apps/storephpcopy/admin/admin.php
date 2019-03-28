<?php
session_start();
?>
<!DOCTYPE html>
 <html>
   <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Admin Console</title>
   <link rel="stylesheet" type="text/css" href="../css/mystyle.css" />
   <link rel="stylesheet" type="text/css" href="../css/form.css">
   </head>
    <?php
    include("../mylibrary/login.php");
    include("../mylibrary/getThumb.php");
    include("../mylibrary/showproducts.php");
    login();
    ?>
     <body>
     <header id="header">
     <?php include("../includes/header.inc.php");?>
     </header>
     <main>
     <nav>
       <?php include("adminnav.inc.php");?>
     </nav>
     <section>
     <h1>Content</h1>
     <?php
   if (!isset($_REQUEST['content']))
   {
      if (!isset($_SESSION['store_admin']))
         include("adminlogin.html");
      else
         include("adminmain.inc.php");
   }
   else
   {
       $content = $_REQUEST['content'];
       $nextpage = $content . ".inc.php";
        include($nextpage);
   } ?>
   </section>
   <aside>
    <h3>Information</h3>
    <?php include("adminstatus.inc.php");?>
   </aside>
  </main>
  <footer>
   <h1>
   <?php include("../includes/footer.inc.php");?>
   </h1>
  </footer>
   </body>
 </html>