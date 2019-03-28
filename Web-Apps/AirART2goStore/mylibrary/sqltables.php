<!--A handy way to create a table is to use a program:-->

<?php
require("../mylibrary/login.php");
login();
?>
<!-- CREATE TABLE categories -->
<?php
  $sql =  "CREATE TABLE  categories(catid int NOT NULL AUTO_INCREMENT PRIMARY           KEY,
          name varchar(30) NOT NULL) ENGINE=INNODB;";   

  $result = mysql_query($sql);

  if (!$result) {
    die("<p>Error in creating table: " . mysql_error() . "</p>");
  }
 
  echo "<p>categories table created</p>";
?>

<!-- CREATE TABLE admins -->
<?php
  $sql =  "CREATE TABLE admins (userid varchar(8) NOT NULL PRIMARY KEY,
          name varchar(100) NOT NULL,
          password varchar(41) NOT NULL) ENGINE=INNODB";   

  $result = mysql_query($sql);

  if (!$result) {
    die("<p>Error in creating table: " . mysql_error() . "</p>");
  }
 
  echo "<p>admins table created</p>";
?>

<!-- CREATE TABLE customers  -->
<?php
  $sql =  "CREATE TABLE customers (custid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
          lastname varchar(40) NOT NULL,
          firstname varchar(40) NOT NULL,
          address varchar(100) NOT NULL,
          city varchar(30) NOT NULL,
          state varchar(2) NOT NULL,
          zip varchar(5) NOT NULL,
          phone varchar(15) NOT NULL,
          email varchar(100) NOT NULL,
          password varchar(41) NOT NULL) ENGINE=INNODB";   

  $result = mysql_query($sql);

  if (!$result) {
    die("<p>Error in creating table: " . mysql_error() . "</p>");
  }
 
  echo "<p>customers table created</p>";
?>

<!-- CREATE TABLE orders  -->

<!--Next, create the orders table. Remember, the orders table includes the custid data field that should be a foreign key pointing to the custid data field in the customers table.-->
<?php
  $sql =  "CREATE TABLE orders (orderid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
          custid int NOT NULL,
          date datetime NOT NULL,
          status varchar(10),
          FOREIGN KEY (custid) REFERENCES customers (custid)
          ) ENGINE=INNODB";   

  $result = mysql_query($sql);

  if (!$result) {
    die("<p>Error in creating table: " . mysql_error() . "</p>");
  }
 
  echo "<p>orders table created</p>";
?>
<!-- CREATE TABLE order_items  -->
<!--Okay, you're almost there; just one more to go! Create the order_items table that has two foreign keys and uses two data fields as the primary key.-->
<?php
  $sql =  "CREATE TABLE order_items (orderid int NOT NULL,
          prodid int NOT NULL,
          quantity int NOT NULL,
          price decimal(6,2) NOT NULL,
          PRIMARY KEY (orderid, prodid),
          FOREIGN KEY (orderid) REFERENCES orders (orderid),
          FOREIGN KEY (prodid) REFERENCES products (prodid)) ENGINE=INNODB";   

  $result = mysql_query($sql);

  if (!$result) {
    die("<p>Error in creating table: " . mysql_error() . "</p>");
  }
 
  echo "<p>order_items table created</p>";
?>

<!-- CREATE TABLE products  -->
<?php
  $sql =  "CREATE TABLE products (prodid int NOT NULL AUTO_INCREMENT PRIMARY            KEY,
          catid int NOT NULL,
          description varchar(100) NOT NULL,
          picture mediumblob,
          price decimal(6,2) NOT NULL,
          quantity int NOT NULL,
          onsale BOOL,
          FOREIGN KEY (catid) REFERENCES categories(catid))
          ENGINE=INNODB";   

  $result = mysql_query($sql);

  if (!$result) {
    die("<p>Error in creating table: " . mysql_error() . "</p>");
  }
 
  echo "<p>products table created</p>";
?>