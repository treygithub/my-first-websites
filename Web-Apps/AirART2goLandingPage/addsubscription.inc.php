<?php
   include("mylibrary/login.php");
   login();

 
   $email = $_POST['email'];

   if (get_magic_quotes_gpc())
   {
      
      $email = stripslashes($email);

   }
   
   $email = mysql_real_escape_string($email);

   $baduser = 0;

   if (trim($email) == '')
      $baduser = 1;

   $query = "SELECT * from subscriptions where email = '$email'";
   $result = mysql_query($query);
   $rows = mysql_num_rows($result);

   if ($rows != 0)
      $baduser = 2;

   if ($baduser == 0)
   {
      $query = "INSERT INTO subscriptions (email)" . " VALUES ('$email')";
      $result=mysql_query($query);


      if ($result)
      {

        echo "<br><br><br><h2 class=\"title\" style=\"text-align:center\">Thank You For Your Subscription!</h2><br><hr/>\n";
     echo "<a href=\"index.html\"><p style=\"text-align:center\">Return to home page</p></a>\n";
     
      }
      else
      {
         echo "<h2>Sorry, I could not process your subscription at this time</h2>\n";
      }
   } else
   {
      switch($baduser)
      {
         case(1):
            header("Location: baduser1.inc.php");
            //echo "<h2>Please enter an e-mail address</h2>\n";
            break;
         case(2):
            header("Location: baduser2.inc.php");
            //echo "<h2>I'm sorry, that e-mail address already exists.</h2>\n";
            break;
       }
   }
?>