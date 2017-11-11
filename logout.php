<?php # logout.php - Reset Session Variables

session_start();
//unset($_SESSION["myusername"]);
//unset($_SESSON["keg"]);
// functionality isn't working for some reason, switching it up
// nbc 5/26/17

$_SESSION["myusername"] = "";
$_SESSION["hasRun"] = FALSE;
unset($_SESSION["hasRun"]);

header("location: login.html");
exit();
?>
