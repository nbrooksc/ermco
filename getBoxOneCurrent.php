<?php # updateTest.php
      # see if the updateBoxOne
      # function is working

require_once 'DB_Functions.php';

$db = new DB_Functions();
$boxOne = $db->getBoxOneCurrent();

$length = $boxOne['current_length'];

echo $length;

?>
