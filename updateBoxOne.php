<?php # updateTest.php
      # see if the updateBoxOne
      # function is working

require_once 'DB_Functions.php';

echo "This is updateTest.php";


if (isset($_POST['length']) && isset($_POST['longitude']) && isset($_POST['latitude'])) 
{
  $length = $_POST['length'];
  $longitude = $_POST['longitude'];
  $latitude = $_POST['latitude'];


  $db = new DB_Functions();
  $result = $db->updateBoxOne($length, $longitude, $latitude);

  echo "<br><br>Result is<br>";
  echo "$result";
}

echo "<br><br>End.<br>";

?>
