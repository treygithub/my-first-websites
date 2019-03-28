<?php

$name = addslashes($_POST['name']);
$visitor_email = $_POST['email'];
$tel = $_POST['phone'];
$message = addslashes($_POST['message']);

$query = "INSERT INTO contact (name, email, phone, message) " .


          " VALUES ('$name', '$visitor_email', '$tel', '$message')";

/* $query results are stored into $results variable */
    $result = mysql_query($query) or die('Sorry, we could not process your request to the database at this time');
    if ($result)


       echo "<h2>We have been notified of your request and recieved your Message! </h2><br><hr/>\n";



    else


       echo "<h2>Sorry, there was a problem posting your recipe</h2>\n";

        echo "<a href=\"index.php?content=main&id=$recipeid\">Return to recipe</a>\n";


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
//header('Location: thank-you.html');


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