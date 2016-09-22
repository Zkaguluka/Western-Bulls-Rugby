<?php
	@ $connect = new mysqli('localhost', 'root', '', 'bullsrugby');

	if (mysqli_connect_errno()) {
		echo "Error: Could not connect to the database. Please try again later.";
		exit();
	}
?>