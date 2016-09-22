<?php
	
	error_reporting(-1);

	$userName = $_POST['forumUserName'];
	$password = $_POST['forumPassword'];
	$passwordConfirmation = $_POST['forumPasswordConfirmation'];
	$forumUserEmail = $_POST['forumUserEmail'];

	//validation should js be turned off 
	if(empty($userName) || empty($password) || empty($forumUserEmail)){
		echo "Please enter a username, password and email in the previous page.";
		exit();

	}
	if($password != $passwordConfirmation){
		echo "The passwords entered in the previous page do not match.";
		exit(); 
	}
	if (preg_match("/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $forumUserEmail)) {
		$validEmail = true;
	}else{
		$validEmail = false;
		echo "Please enter a valid email address on the previous page";
		exit();
	}

	include_once("connectToDb.php");
		
	$userName = mysqli_real_escape_string($connect, trim($_POST['forumUserName']));
	$password = sha1(trim($_POST['forumPassword']));
	$forumUserEmail	= mysqli_real_escape_string($connect, $forumUserEmail);
		
	$searchUserExistanceQuery = "SELECT * FROM forumusers WHERE userName = '".$userName."' AND email = '".$forumUserEmail."'";
		
	$result = mysqli_query($connect, $searchUserExistanceQuery);
	
	if(mysqli_num_rows($result) == 0) {
		$insertNewUserQuery = "INSERT INTO forumusers VALUES('','".$userName."', sha1('".$password."'), '".$forumUserEmail."', NOW())";

		mysqli_query($connect, $insertNewUserQuery) or die("An error occured. Couldn't execute insert query");
				
		header("Location: forumTest.php");
		echo "Your new account has been created. You can now log in and participate on the forum.";
		mysqli_close($connect);

	}
	else{
		echo "Oops! The user profile you entered already exists.";
		exit();
	}
		
?>