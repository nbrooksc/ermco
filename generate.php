<?php # table.php
      # table to display all of the kegs in the database
      # with some way to organize them or draw attention 
      # to alerts

// Need a Database Connetion
require('../../inc/db.php');

// Clear the table

$sql = 'TRUNCATE TABLE master';
$result = mysql_query($sql) or die(mysql_error());



for ($i = 0; $i < 30; $i++) {

  $name = "k" . $i;

  $rem = rand(0, 100);
  $pres = rand(18, 63);
  $tempt = rand(34, 65);
  $typeKey = rand(0, 8);
  $locationKey = rand(0, 2);

  switch($typeKey) {
    case '0':
      $type = 'Pilsner';
      break;
    case '1':
      $type = 'IPA';
      break;
    case '2':
      $type = 'Stout';
      break;
    case '3':
      $type = 'Lager';
      break;
    case '4':
      $type = 'Bock';
      break;
    case '5':
      $type = 'Porter';
      break;
    case '6':
      $type = 'Wheat';
      break;
    case '7':
      $type = 'Belgian';
      break;
    default:
      $type = 'Brown Ale';
      break;

  }

  switch($locationKey) {
    case 0:
      $location = "South Loop";
      break;
    case 1:
      $location = "Chicago Avenue";
      break;
    default:
      $location = "Lombard";
      break;
  }


  // Cycle through to see if any of the metrics meet alert criteria

  // First create default value, in case nothing is tripped
  $alert = "None";

  if ($rem < 10) {
    $alert = "Volume";
  } else if ($pres < 20) {
    $alert = "Pressure";
  } else if ($tempt > 63) {
    $alert = "Temperature";
  }


  
  



  $sql = 'INSERT INTO master (name, remaining, date, type, location, alert, ';

  $sql = $sql .  'pressure, temperature)';

  $sql = $sql . " VALUES ('$name', '$rem', now(), '$type', '$location', '$alert', '$pres', '$tempt')";

  $result = mysql_query($sql) or die (mysql_error());
}

?>
