<?php # textTest.php
      # see if we can get vilio
      # to send a text

// require __DIR__ . '/vendor/autoload.php';
require '../../../../tmp/vendor/autoload.php';
echo "Got past the require<br>";

use Twilio\Rest\Client;

$sid = 'AC39e738ee9462246f5359addcc53054bb';
$token = '930bb3a9f2d7e116d530e06396012c87';
$client = new Client($sid, $token);


$client->messages->create(
  //the number you'd like to send the message to
  '+17738958134',
  // the body of the text message you'd like to send
  array(
	// A Twilio phone number you puchased at twilio.com/console
	'from' => '+13178545315',
	// the body of the text message you'd like to send
	'body' => 'Pull Started by Frank in Indianapolis, IN'
  )
);

echo "<br><br>This is the last line<br>";

?>
