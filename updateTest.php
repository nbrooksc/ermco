<?php # updateTest.php
      # see if the updateBoxOne
      # function is working

require_once 'DB_Functions.php';

echo "This is updateTest.php";

$db = new DB_Functions();
$result = $db->updateBoxOne(48);

echo "<br><br>Result is<br>";
echo "$result";

echo "<br><br>End.<br>";

?>
