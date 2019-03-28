<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" media="screen" type="text/css" href="frontdoor.css" />
    <title>snake game</title>
</head>
    <body>
            <!-- his code first checks whether the content variable has been set using any HTML method. If not, it includes the login.inc.php file, which will display login screen.-->
            <div id="main">

            <?php

            if (!isset($_REQUEST['content']))

            include("login.inc.php");

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
    </body>

    </html>

