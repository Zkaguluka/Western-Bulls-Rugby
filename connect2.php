<?php
	
	$name = $_POST['feedbackFormUserName'];
	$email = $_POST['feedbackFormEmail'];
	$subject = $_POST['feedbackFormSubject'];
	$message = $_POST['feedbackFormMessage'];

	//validation should js be turned off 
	
	if(empty($name) || empty($email) || empty($subject) || empty($message)){
		echo "Please fill all fields.";
		exit;
	}
	
	$name = trim($_POST['feedbackFormUserName']);
	$email = trim($_POST['feedbackFormEmail']);
	$subject = trim($_POST['feedbackFormSubject']);
	$message = trim($_POST['feedbackFormMessage']);

	//handle special characters
	if (!get_magic_quotes_gpc()) {
		$name = addslashes($name);
		$email = addslashes($email);
		$subject = addslashes($subject);
		$message = addslashes($message);
	}

	//est conn
	$conn = new mysqli('localhost', 'root', '', 'bullsrugby');

	//validate conn
	if (mysqli_connect_errno()) {
		echo "An error occured. Could not connect to the database. Please try again later.";
		exit;
	}

	$insertQuery = "insert into feedbacklist(messageId, name, email, subject, message) values('', '".$name."', '".$email."', '".$subject."', '".$message."')";

	mysqli_query($conn, $insertQuery);

	echo "Message sent succesfuly";
	mysqli_close($conn);

?>