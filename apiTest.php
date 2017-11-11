<?php # apiTest.php
      # Script to see if 
      # API is working 

require_once 'DB_Functions.php';

echo "This is apiTest.php";

$db = new DB_Functions();
 $result = $db->getBoxOnePulls();

echo "<br><br>Result is<br>";

echo "as variable $result<br>";

var_dump($result);

echo "<br><br>End.";

?>
