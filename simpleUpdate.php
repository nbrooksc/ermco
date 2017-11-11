<?php # updateTest.php
      # see if the updateBoxOne
      # function is working

require_once 'DB_Functions.php';

echo "This is simpleUpdate.php";


if (isset($_POST['current_length_one']) && isset($_POST['longitude']) && isset($_POST['latitude'])) 
{
  // $length = $_POST['length'];
  $longitude = $_POST['longitude'];
  $latitude = $_POST['latitude'];
  $length = $_POST['current_length_one'];

  $db = new DB_Functions();
  $result = $db->simpleUpdateBoxOne($length, $longitude, $latitude);

  echo "<br><br>Result is<br>";
  echo "$result";
}

if (isset($_POST['current_length_two'])) {
  $db = new DB_Functions();
  $lengthTwo = $_POST['current_length_two'];
  $result = $db->simpleUpdateBoxTwo($lengthTwo, 50, 52);
}


if (isset($_POST['current_length_three'])) {
  $db = new DB_Functions();
  $lengthTwo = $_POST['current_length_three'];
  $lengthThree = $_POST['current_length_three'];
  $result = $db->simpleUpdateBoxThree($lengthThree, 50, 52);
}


/*
if (isset($_POST['current_length_two']) && isset($_POST['longitude']) && isset($_POST['latitude'])) 
{
  $longitude = $_POST['longitude'];
  $latitude = $_POST['latitude'];
  $length = $_POST['current_length_two'];

  $db = new DB_Functions();
  $result = $db->simpleUpdateBoxTwo($length, $longitude, $latitude);

  echo "<br><br>Result is<br>";
  echo "$result";
}

if (isset($_POST['current_length_three']) && isset($_POST['longitude']) && isset($_POST['latitude'])) 
{
  $longitude = $_POST['longitude'];
  $latitude = $_POST['latitude'];
  $length = $_POST['current_length_three'];

  $db = new DB_Functions();
  $result = $db->simpleUpdateBoxThree($length, $longitude, $latitude);

  echo "<br><br>Result is<br>";
  echo "$result";
}
*/
echo "<br><br>End.<br>";

?>
