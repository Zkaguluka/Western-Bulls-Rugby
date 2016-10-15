<?php
	session_start();
	if (isset($_SESSION['userid'])) {
		$_SESSION = array();
	}
	if (isset($_COOKIE[session_name()])) {
		setcookie('session_name()', '', time()-600);
	}
	session_destroy();
	
	header("Location: forumTest.php");

?>