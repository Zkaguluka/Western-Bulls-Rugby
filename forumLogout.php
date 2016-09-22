<?php
	session_start();
	session_destroy();
	header("Location: forumTest.php");
?>