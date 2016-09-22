<?php
	
	$userName = $_POST['homepageUserName'];
	$email = $_POST['homepageUserEmail'];

	//validation in case js turned off
	if(empty($_POST['homepageUserName']) || empty($_POST['homepageUserEmail'])){
		echo"Please enter both your name and email address in the previous page.";		
		exit();
	}
	if (preg_match("/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $email)) {
		$validEmail = true;
	}else{
		$validEmail = false;
		echo "Please enter a valid email address on the previous page";
		exit();
	}

	$userName = mysqli_real_escape_string($connect, trim($_POST['homepageUserName']));
	$email = mysqli_real_escape_string($connect, trim($_POST['homepageUserEmail']));

	include_once(connectToDb.php);
		
	$searchUserExistanceQuery = "SELECT * FROM newslettersubscribers WHERE subscriberEmail = '".$email."' ";

	
	$result = mysqli_query($connect, $searchUserExistanceQuery);

	if (mysqli_num_rows($result) == 0) {
		$insertQuery = "INSERT INTO newslettersubscribers VALUES('', '".$userName."', '".$email."')"; 
		
		mysqli_query($connect, $insertQuery);
		
		echo "Your subscription process was succesful.";
		mysqli_close($connect);
		
	}
	else{
		echo "Your profile already exists in the subscription list.";
		exit();
	}	
?>