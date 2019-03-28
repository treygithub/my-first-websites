<?php
/*
   include("/homepages/12/d717735508/htdocs/trappertrey/addsubscription.inc.php");
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

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$tel = $_POST['phone'];
$message = $_POST['message'];

   if (get_magic_quotes_gpc())
   {
      $name = stripslashes($name);
      $visitor_email = stripslashes($visitor_email);
      $tel = stripslashes($tel);
      $message = stripslashes($message);
   }
   $name = mysql_real_escape_string($name);
      $visitor_email = mysql_real_escape_string($visitor_email);
      $tel = mysql_real_escape_string($tel);
      $message = mysql_real_escape_string($message);


   $baduser = 0;

   if (trim($name) == '')
      $baduser = 1;

   if (trim($visitor_email) == '')
      $baduser = 2;

   if ($rows != 0)
      $baduser = 3;

   if ($baduser == 0)
   {
  
$query = "INSERT INTO contact (name, email, phone, message) " .


          " VALUES ('$name', '$visitor_email', '$tel', '$message')";

/* $query results are stored into $results variable */
    $result = mysql_query($query) or die('Sorry, we could not process your request to the database at this time');


      if ($result)
      {
         $query = "SELECT LAST_INSERT_ID() from contact";
         $result = mysql_query($query);
         $row = mysql_fetch_array($result);
         header("Location: confirmcontact.inc.php");
      }
      else
      {
         header("Location: baduser3.inc.php");
      }
   } else
   {
      switch($baduser)
      {
         case(1):
            echo "<h2>Please enter an name address</h2>\n";
            break;
         case(2):
            echo "<h2>Please enter a e-mail</h2>\n";
            break;
         case(3):
            echo "<h2>Other problem detected</h2>\n";
            break;
       }
       echo "<a href=\"services.html\">Try again</a>\n";
   }

/* 
//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'Trey@hunecut.com';//<== update the email address
$email_subject = "New Message from Hunecut.com";
$email_body = "You have received a new message from the user $name \n Phone#: $tel \n email: $visitor_email\n".
    "Here is the message:\n $message\n".
    
$to = "trey@hunecut.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header("Location: index.php?content=confirmcontact");


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
*/
   
?> 