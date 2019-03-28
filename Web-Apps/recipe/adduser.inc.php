<?php


$host_name = 'ddfeeerer';
$database = 'db718616938';
$user_name = 'dbo718616938';
$password = 'ddfeeerer';
$con = mysql_connect($host_name, $user_name, $password, $database) or  die('Sorry, could not connect to server');

if (!$con)


{


   echo "<h2>Sorry, we cannot process your request at this time, please try again later</h2>\n";


   echo "<a href=\"index.php?content=register\">Try again</a><br>\n";


   echo "<a href=\"index.php\">Return to Home</a>\n";


   exit;


}


mysql_select_db("db718616938", $con) or die('Sorry, could not connect to database');

$userid = $_POST['userid'];

$password = $_POST['password'];

$password2 = $_POST['password2'];

$fullname = $_POST['fullname'];

$email = $_POST['email'];

$baduser = 0;

/* encription */
$hashFormat = "$2y$10$";
$salt = "iusesomecrazystrings22";
$hashF_and_salt = $hashFormat . $salt;
$password = crypt($password,$hashF_and_salt);
$password2 = crypt($password2,$hashF_and_salt);
/*end encription */

/* The code performs four different checks on the data the visitor enters into the form before attempting to create the new user account. :*/

// Check if userid was entered

if (trim($userid) == '')

{

   echo "<h2>Sorry, you must enter a user name.</h2><br>\n";

   echo "<a href=\"index.php?content=register\">Try again</a><br>\n";

   echo "<a href=\"index.php\">Return to Home</a>\n";

   $baduser = 1;

}

//Check if password was entered

if (trim($password) == '')

{

   echo "<h2>Sorry, you must enter a password.</h2><br>\n";

   echo "<a href=\"index.php?content=register\">Try again</a><br>\n";

   echo "<a href=\"index.php\">Return to Home</a>\n";

   $baduser = 1;

}

//Check if password and confirm password match

if ($password != $password2)

{

   echo "<h2>Sorry, the passwords you entered did not match.</h2><br>\n";

   echo "<a href=\"index.php?content=register\">Try again</a><br>\n";

   echo "<a href=\"index.php\">Return to Home</a>\n";

   $baduser = 1;

}

//Check if userid is already in database

$query = "SELECT userid from users where userid = '$userid'";

$result = mysql_query($query);

$row = mysql_fetch_array($result, MYSQL_ASSOC);

if ($row['userid'] == $userid)

{

   echo "<h2>Sorry, that user name is already taken.</h2><br>\n";

   echo "<a href=\"index.php?content=register\">Try again</a><br>\n";

   echo "<a href=\"index.php\">Return to Home</a>\n";

   $baduser = 1;

}

if ($baduser != 1)

{

   //Everything passed, enter userid in database

   $query = "INSERT into users VALUES ('$userid', PASSWORD('$password'), '$fullname', '$email')";

   $result = mysql_query($query) or die('Sorry, we are unable to process your request.');

   if ($result)

   {
    /*If the INSERT statement is successful, the program creates a new variable in the session cookie using the code:*/
      $_SESSION['valid_recipe_user'] = $userid;

      /* The $_SESSION[] array variable contains the data values stored in the session cookie temporary file on the server. This code creates a session cookie variable called valid_recipe_user and sets its value to the actual user account name.*/

      echo "<h2>Congratulations! Your registration request has been approved, Your user name is $userid you are now logged in!</h2>\n";

      echo "<a href=\"index.php\">Return to Home</a>\n";


   } else

   {

      echo "<h2>Sorry, there was a problem processing your login request</h2><br>\n";

      echo "<a href=\"index.php?content=register\">Try again</a><br>\n";

      echo "<a href=\"index.php\">Return to Home</a>\n";
      exit;

   }

}

?>

