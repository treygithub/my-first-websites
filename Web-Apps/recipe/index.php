<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Family Recipe Center</title>
<link rel="stylesheet" media="screen" type="text/css" href="mystyle.css"/>
<link rel="stylesheet" media="print" type="text/css" href="print.css" />
</head>


    <body>

    <div id="header">

        <?php include("header.inc.php"); ?>

    </div>

    <!-- content div wraps the the nav main and news section together so we can positon them how we like -->

    <div id="content">

        <div id="nav">

            <?php include("nav.inc.php"); ?>

        </div>
        <!-- his code first checks whether the content variable has been set using any HTML method. If not, it includes the main.inc.php file, which will display our current list of recipes.-->

        <div id="main">

            <?php

            if (!isset($_REQUEST['content']))

            include("main.paging.inc.php");

            else
            
            /* If the content variable has been set, that means the index.php file has been called from another Web page in the application, requesting a different content include file in the main cell section. The content variable is retrieved and assigned to the PHP variable $content. */

            {

            $content = $_REQUEST['content'];
            
           /* Next, the full PHP include file name extension is added to the content value using the PHP dot operator. This operator just appends the second text object to the first text object. Finally, you use the PHP include() function to include the next PHP include file.*/

           /* explaination #2 The browser will ask for the index.php Web page, then the main section will retrieve the content value, add the .inc.php extension to it, then use the include() function to produce the register.inc.php content in the Web page.*/

            $nextpage = $content . ".inc.php";

            include($nextpage);

            }

            ?>

        </div>

        <div id="news">
            
          <?php include("news.inc.php"); ?>

        </div>

    </div>

    <div id="footer">


    <?php include("footer.inc.php"); ?>

    </div>

</body>

</html>