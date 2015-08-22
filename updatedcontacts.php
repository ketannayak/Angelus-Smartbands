<?php

	include('sql.php'); 
	
	// sql to delete a record
	$sql = "DELETE FROM  coreUsers WHERE coreID ='53ff69066667574820252067'";
	$connect->query($sql) ;


	//sql to insert the records
	for($i =1; $i <= 5; $i++) {
		$namethistime = $_POST['name' . $i];
                $numberthistime =  $_POST['phonenumber' . $i];
	
		if(!empty($namethistime) || !empty($numberthistime) ){
		
		$sqlinsert = "INSERT INTO coreUsers (coreId, nickname, phonenumber)  SELECT '53ff69066667574820252067', '" . $namethistime .  "','" . $numberthistime . "'" ;
		$connect->query($sqlinsert);

		}

	} 
	

require('signin.php');

?>

