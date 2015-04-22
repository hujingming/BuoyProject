<?php

include('config.php');

// table name 
$tbl_name = users;

// Random confirmation code 
$confirm_code=md5(uniqid(rand())); 

// values sent from form 
/*$email=$_POST['email'];
$password=$_POST['password'];
$password1=$_POST['password1'];*/

$email = $_GET['email'];
$createdPassword = $_GET['createdPassword'];



// Insert data into database 
//$sql="INSERT INTO $tbl_name(confirm_code, name, email, password, country)VALUES('$confirm_code', '$name', '$email', '$password', '$country')";
//$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email 
//if($result){
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;
print "<p>$to</p>";

// Your subject
$subject="Your Buoy account activation link";

// From
$header="from: Buoy";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="[INCLUDE VERIFICATION LINK HERE] \r\n";
$message.="username: " . $email . "\r\n";
$message.="password: " . $createdPassword . "\r\n";

print "<p>$message</p>";
// send email
//if($password == $password1){
$sentmail = mail($to,$subject,$message,$header);
print "<p>sent mail: $sentmail</p>";
//}
//else {
//	echo "Passwords do not match. Please retry.";
//}
//}

// if not found 
//else {
//echo "Not found your email in our database";
//}

// if your email succesfully sent
if($sentmail){
echo "Your Buoy account activation link has been sent to " . $email;
}
else {
echo "Buoy account activation link could not be sent. Please retry.";
}
?>