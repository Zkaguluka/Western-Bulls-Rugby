<?php
	session_start();
	
	if (isset($_POST['login'])) {

		include_once("connectToDb.php");

		if(empty(trim($_POST['forumLoginUserName'])) || empty(trim($_POST['forumLoginPassword']))){
			echo "Please enter your username and password to log in.";
			exit();
		}
		
		$userName = mysqli_real_escape_string($connect, trim($_POST['forumLoginUserName']));
		$password = sha1(trim($_POST['forumLoginPassword']));

		
		$searchUserExistanceQuery = "SELECT * FROM forumusers WHERE userName = '".$userName."' AND password = sha1('".$password."')";

		$result = mysqli_query($connect, $searchUserExistanceQuery);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$_SESSION['userId'] = $row['userId'];
			$_SESSION['userName'] = $row['userName'];
			header("Location: forumTest.php");			
			exit();

		}
		else{
			echo "The username or password you entered is invalid. Please return to the previous page and try again";
			exit();
		}
						
	}
	else{
		echo "<p class='text-center'>We are experiencing problems logging you into your account. Please refresh the page and try again.</p>";
	}

?>