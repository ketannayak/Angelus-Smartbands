<?php
	require('sql.php');
	$result = $connect->query("SELECT frm, message FROM messages;");
	
    printf("Select returned %d rows.\n", $result->num_rows);

	 /* fetch object array */
	while ($row = $result->fetch_row()) {
		printf ("%s (%s)<br/>", $row[0], $row[1]);
	}

	/* free result set */
	$result->close();

?>