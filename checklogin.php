<?php # checklogin.php

// Script to validate the username and password 
// Entered on the login screen

// Login Screen Form Passes username and password
// here

// All usernames and passwords are retrieved from the MySQL
// And we see if the input is valid 

$host = "localhost";
$username = "root";
$password = "7abAtHew";
$db_name = "kegs";
$tbl_name = "members";

// Connect to server, select database.
mysql_connect("$host", "$username", "$password") or die("cannot connect");
mysql_select_db("$db_name") or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matches $myusername and $mypassword
if ($count==1) {
	
	// Register $myusername and $mypassword to session
	// Continue to kegview.php to view website
	
	session_start();
	
	$_SESSION["myusername"] = $myusername;
	$_SESSION["mypassword"] = $mypassword;
	header("location:index3.html");
}

else {
	echo "Wrong Username or Password";
	echo "username is $myusername <br><br>password is $mypassword";
}
?>
