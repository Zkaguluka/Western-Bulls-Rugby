<?php
	session_start();

	error_reporting(-1);

	if ($_SESSION['userId'] == "") {
		header("Location: forumTest.php");
		exit();
	}
	
	if (isset($_POST['forumTopicCreationButton'])) {
		if (($_POST['forumTopicTitle'] == "") && ($_POST['forumTopicContent']) == "") {
			echo "Please fill in all fields on the previous page.";
			exit();
		} 
		else{
			include_once("connectToDb.php");

			$cid = $_POST['cid'];
			$title = mysqli_real_escape_string($connect, trim($_POST['forumTopicTitle']));
			$content = mysqli_real_escape_string($connect, trim($_POST['forumTopicContent']));
			$creator = $_SESSION['userId'];
			
			$insertTopicQuery = "INSERT INTO forumtopics VALUES(".$cid."', '".$title."', '".$creator."', now(), now())";

			$insertTopicQueryResult = mysqli_query($connect, $insertTopicQuery) or die("Died @ query1");
			$topicId = mysqli_insert_id($connect);
			
			$insertIntoPosts = "INSERT INTO forumposts VALUES('".$cid."', '".$topicId."', '".$creator."', '".$content."', now())"; 
			$insertIntoPostsResult = mysqli_query($connect, $insertIntoPosts) or die("Died @ query2");

			$updateCategoriesQuery = "UPDATE forumCategories SET lastPostDate=now(), lastUserPOSTED='".$creator."',WHERE id='".$cid."' LIMIT 1 ";
			$updateCategoriesQueryResult = mysqli_query($connect, $updateCategoriesQuery) or die("Died @ query3");
			
			if (($insertTopicQueryResult) && ($insertIntoPostsResult) && ($updateCategoriesQueryResult)) {
				header("Location: viewForumTopic.php?cid=".$cid."&tid=".$topicId."");
			}
			else{
				echo "There was a problem creating your topic. Please try again";
			}

		}

	}

?>