<?php
   include("mylibrary/login.php");
   login();

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

   if (get_magic_quotes_gpc())
   {
      $name = stripslashes($name);
      $visitor_email = stripslashes($visitor_email);
      $subject = stripslashes($subject);
      $message = stripslashes($message);
   }
      $name = mysql_real_escape_string($name);
      $visitor_email = mysql_real_escape_string($visitor_email);
      $subject = mysql_real_escape_string($subject);
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
  
$query = "INSERT INTO contact (name, email, subject, message) " .


          " VALUES ('$name', '$visitor_email', '$subject', '$message')";

/* $query results are stored into $results variable */
    $result = mysql_query($query) or die('Sorry, we could not process your request to the database at this time');


      if ($result)
      {
         $query = "SELECT LAST_INSERT_ID() from contact";
         $result = mysql_query($query);
         $row = mysql_fetch_array($result);
         echo "<br><br><br><h2 class=\"title\" style=\"text-align:center\">The Wed Dev Trey has been notified of your request and recieved your Message! He will respond fast as humanly possible</h2><br><hr/>\n";
     echo "<a href=\"index.html\"><p style=\"text-align:center\">Return to home page</p></a>\n";
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
            echo "<h2>Please enter a name address</h2>\n";
            break;
         case(2):
            echo "<h2>Please enter a e-mail</h2>\n";
            break;
         case(3):
            echo "<h2>Other problem detected</h2>\n";
            break;
       }
       echo "<a href=\"contact.html\">Try again</a>\n";
   }


//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Nice Try! IP address is now logged...";
    exit;
}

$email_from = 'Trey@hunecut.com';//<== update the email address
$email_subject = "New Message AirART2go page";
$email_body = "You have received a new message from the user $name \n Subject is: $subject \n email: $visitor_email\n".
    "Here is the message:\n $message\n".
    
$to = "trey@hunecut.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header("Location: confirmcontact.inc.php");


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

   
?> 