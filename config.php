<?php

$host="mysql.rosta-farzan.net"; // Host name 
$username="buoy2560"; // Mysql username 
$passwordDB="bu0y$0652"; // Mysql password 
$db_name="buoy2560"; // Database name 


//Connect to server and select database.
$conn = mysql_connect("$host", "$username", "$passwordDB")or die("cannot connect to server"); 
mysql_select_db("$db_name")or die("cannot select DB");

?>