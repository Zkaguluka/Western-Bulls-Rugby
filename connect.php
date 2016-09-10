<?php
	
	$userName = $_POST['homepageUserName'];
	$email = $_POST['homepageUserEmail'];

	//validation in case js turned off
	if(empty($_POST['homepageUserName']) || empty($_POST['homepageUserEmail'])){
		echo"Please enter both your name and email address.";		
		exit;
	}
	
	$userName = trim($_POST['homepageUserName']);
	$email = trim($_POST['homepageUserEmail']);

	//quote the data(handle special characters)
	if(!get_magic_quotes_gpc()){
		$userName = addslashes($userName);
		$email = addslashes($email);
	}

	//est connect
	@ $connect = new mysqli('localhost', 'root', '', 'bullsrugby');
	
	//validate connect
	if(mysqli_connect_errno()){
		echo "Error: Could not connect to the database. Please try again later.";
		exit;
	}

	/*$searchExistanceQuery = "SELECT * FROM newslettersubscribers WHERE  MATCH(userName, email) AGAINST ('') ";

	$result = mysqli_query($connect, $searchExistanceQuery);*/

	$insertQuery = "INSERT INTO newslettersubscribers(subscriberId, userName, email) VALUES('', '".$userName."', '".$email."')"; 
	
	mysqli_query($connect, $insertQuery);
	
	//echo "Your subscription process was succesful.";
	mysqli_close($connect);	
?>