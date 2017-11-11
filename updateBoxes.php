<?php # updateTest.php
      # see if the updateBoxOne
      # function is working

require_once 'DB_Functions.php';

$db = new DB_Functions();
$boxOne = $db->getBoxOneCurrent();
$boxTwo = $db->getBoxTwoCurrent();
$boxThree = $db->getBoxThreeCurrent();




$toPrint = <<<EOT
{$boxOne['current_length']}
EOT;

$toPrintTwo = <<<EOT
{$boxTwo['current_length']}
EOT;

$toPrintThree = <<<EOT
{$boxThree['current_length']}
EOT;



// $toPrint = json_encode(array("panel" => $toPrint));

$toPrint = json_encode(array("one" => $toPrint, "two" => $toPrintTwo, "three" => $toPrintThree));


echo $toPrint; 

?>
