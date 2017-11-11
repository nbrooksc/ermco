<?php # updateTest.php
      # see if the updateBoxOne
      # function is working

require_once 'DB_Functions.php';

echo "This is viewBoxes.php";
echo "<br>Displaying the most recent entry for all three wirepulse boxes<br>";


$db = new DB_Functions();
$boxOne = $db->getBoxOneCurrent();
$boxTwo = $db->getBoxTwoCurrent();
$boxThree = $db->getBoxThreeCurrent();

echo "<br>Box One<br>";
var_dump($boxOne);

echo "<br><br><br>Box Two<br>";
var_dump($boxTwo);

echo "<br><br><br>Box Three<br>";
var_dump($boxThree);

echo "<br><br>End.<br>";

?>
