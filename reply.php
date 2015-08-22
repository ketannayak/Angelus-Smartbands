<?php
//	require('sql.php');

//	$result = $connect->query("INSERT INTO messages (message, frm) VALUES ('$body_message', '$phone_number')");
	// $result = $connect->query("SELECT frm, message FROM messages;");
	
    // printf("Select returned %d rows.\n", $result->num_rows);

	 // /* fetch object array */
	// while ($row = $result->fetch_row()) {
		// printf ("%s (%s)<br/>", $row[0], $row[1]);
	// }

	/* free result set */
	// $result->close();

?>



// this line loads the library 
<?php
error_reporting(E_ALL);
require("sql.php");
require('twilio/Services/Twilio.php'); 
$phone_number = $connect->real_escape_string($_GET['From']);
$body_message = $connect->real_escape_string($_GET['Body']);
	if (substr($phone_number,0,2) == "+1") {
	  $phone_number = substr($phone_number, 2, strlen($phone_number)-2);
	}
	$connect->query("INSERT INTO messages (message) VALUES('".$phone_number.":".$body_message."');");



// twilio
//$account_sid = 'AC8b544d12de2116306aad624241a81c3a';
//$auth_token = '7befcdd14703715b5c860699882d144d';
$account_sid = 'AC6ab05e44d91b08865d524e3bf2eed82f'; 
$auth_token = '238ac1fcca9e2e1e55e080f8dbe8c281'; 
//$account_sid = 'AC6d2c588442b719ffe992d542e40b7ee9'; 
//$auth_token = '36554a99d691f05c7bdfb5bad83f2b9e'; 
$client = new Services_Twilio($account_sid, $auth_token); 
	
// get the target #s
$phoneNumbers = $connect->query("SELECT phoneNumber, a.coreId from
(SELECT cu.coreId from coreUsers cu JOIN alerts a ON a.coreId = cu.coreId WHERE cu.phoneNumber = '$phone_number' order by a.alertId desc limit 1) a
JOIN coreUsers cu2 ON cu2.coreId = a.coreId
WHERE phoneNumber != '$phone_number';");

 while ($row = $phoneNumbers->fetch_row()) {
		$nickname = $connect->query("SELECT nickname from coreUsers where phoneNumber = '$phone_number' and coreId='".$row[1]."'");
		$nickname = $nickname->fetch_row()[0];
		
		$message = $client->account->messages->create(array( 
		'To' => $row[0], 
		'From' => "+14109275627", 
		'Body' => trim($nickname).": ".$body_message,   
	));

		printf ("%s (%s)<br/>", $row[0], $row[1]);
	}
 
echo "Sent message {$message->sid}";
