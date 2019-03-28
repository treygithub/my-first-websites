<?php
/*
   include("/trappertrey/addsubscription.inc.php");
   login();
*/

$host_name = 'db733518387.db.1and1.com';
$database = 'db733518387';
$user_name = 'dbo733518387';
$password = 'ddfeeerer';

$con = mysql_connect($host_name, $user_name, $password, $database);
if (mysql_errno()) {
    die('<p>Failed to connect to MySQL: '.mysql_error().'</p>');
} else {
    mysql_select_db("db733518387", $con) or die('Sorry, could not connect to database');
}
   
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

       header("Location: confirmsubscription.inc.php");
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