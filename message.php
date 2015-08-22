// this line loads the library 
<?php
error_reporting(E_ALL);
require("sql.php");
require('twilio/Services/Twilio.php'); 
require("shorten.php");
$coreId = $connect->real_escape_string($_REQUEST["coreId"]);
$connect->query("INSERT INTO alerts (coreId) VALUES('$coreId');");
$users = $connect->query("SELECT phoneNumber, cu.nickname, c.nickname AS coreNickname FROM coreUsers cu JOIN cores c ON c.coreId = cu.coreId where cu.coreId = '$coreId';");
//$account_sid = 'AC8b544d12de2116306aad624241a81c3a';//'AC8b544d12de2116306aad624241a81c3a';
//$auth_token = '7befcdd14703715b5c860699882d144d';//'7befcdd14703715b5c860699882d144d';
$account_sid = 'AC6ab05e44d91b08865d524e3bf2eed82f'; 
$auth_token = '238ac1fcca9e2e1e55e080f8dbe8c281'; 
//$account_sid = 'AC6d2c588442b719ffe992d542e40b7ee9'; 
//$auth_token = '36554a99d691f05c7bdfb5bad83f2b9e'; 
$client = new Services_Twilio($account_sid, $auth_token); 


$mapurl = "";
$googer = new GoogleURLAPI();
$endurl = uniqid();
 	while ($row = $users->fetch_row()) {
		if ($mapurl =="") {
		$mapurl = $googer->shorten("https://www.google.com/maps/search//@38.855146,-77.0497013,21z/$endurl");
		}
		
		$message = $client->account->messages->create(array( 
		'To' => $row[0], 
		'From' => "+14109275627", 
		'Body' => trim($row[2])." needs assistance. " . $mapurl . " Reply if you can help!",   
	));

		printf ("%s (%s)<br/>", $row[0], $row[1]);
	}
 


echo "Sent message {$message->sid}";
