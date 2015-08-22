// this line loads the library 
<?php
 error_reporting(E_ALL);
echo "Hello1";
require('twilio/Services/Twilio.php'); 
echo "Hello";
$account_sid = 'AC6d2c588442b719ffe992d542e40b7ee9'; 
$auth_token = '36554a99d691f05c7bdfb5bad83f2b9e'; 
$client = new Services_Twilio($account_sid, $auth_token); 
 
$message = $client->account->messages->create(array( 
	'To' => "2404984258", 
	'From' => "+12407435426", 
	'Body' => "PRAGUN needs help",   
));

echo "Sent message {$message->sid}";