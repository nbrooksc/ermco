<?php # sendText.php
      # script for sending a text

// need the SDK
require 'vendor/autoload.php';
use Aws\Sns\SnsClient;

  $sns = SnsClient::factory(array(
    'key' => 'AKIAI6OC76PMKW475UNQ',
    'secret' => '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',
    'region' => 'us-east-1',
    'version' => '2010-03-31'
  ));

$payload = array(
'Message' => 'AWS SNS Send Message directly to mobile phone',
'PhoneNumber' => '+16302072679'
);


$thesmsmessage = "Hello everybody this is now a bank robbery.";
$phonenumber = "+16302072679";
/*
$result = $client->publish([
'Message' => $thesmsmessage, // REQUIRED
'MessageAttributes' => [
'String' => [
'DataType' => 'String', // REQUIRED
'StringValue' => 'string',
],
],
'MessageStructure' => 'SMS',
'PhoneNumber' => $phonenumber,
]);
*/

$SMSattributes = [
  'DeliveryStatusIAMRole' => 'arn:aws:iam::ACCOUNT:role/IAMROLE',
  'DeliveryStatusSuccessSamplingRate' => '100',
  'TopicARN' => 'arn:aws:sns:us-east-1:804402295963:WirePulse'
];


echo "<br><br>";
var_dump($payload);

try {
$result = $sns->publish([
'Message' => 'Job Started by Frank in Indianapolis', // REQUIRED
'MessageAttributes' => [
'String' => [
'DataType' => 'String', // REQUIRED
'StringValue' => 'string',
'TopicArn' => 'arn:aws:sns:us-east-1:804402295963:WirePulse'
],
],
'MessageStructure' => 'SMS',
'PhoneNumber' => '16302072679',
'TopicArn' => 'arn:aws:sns:us-east-1:804402295963:WirePulse'
]);

} catch ( Exception $e) {
  echo "Send failed!\n" . $e->getMessage();
}
/*

try {
  echo "\nConfiguration Response:\n";
    $configuration = $sns->setSMSAttributes([
      'attributes'=> $SMSattributes // REQUIRED
    ]);
  var_dump($configuration);

  echo "\nPublish Response:\n";

  $result=$sns->publish($payload);

  var_dump($result);

  echo "\nMessage Published Successfully !! Check your mobile device for the message\n";
  echo "\nFor more detailed logging, check your S3 bucket for teh Usage Reports generated.\n*** Note: These reports are generated on a daily basis.\n";
} catch ( Exception $e) {
  echo "Send Failed!\n" . $e->getMessage();
  //var_dump($result);
} */
?>


echo "<br><br>End of thing<br>";
?>
