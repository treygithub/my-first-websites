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
         header("Location: index.php?content=confirmsubscription");
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
            header("Location: index.php?content=baduser1");
            //echo "<h2>Please enter an e-mail address</h2>\n";
            break;
         case(2):
            header("Location: index.php?content=baduser2");
            //echo "<h2>I'm sorry, that e-mail address already exists.</h2>\n";
            break;
       }
       echo "<a href=\"index.php?content=newsletter\">Try again</a>\n";
   }
?>