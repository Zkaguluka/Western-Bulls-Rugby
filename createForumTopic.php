<?php session_start(); ?>
<?php 
	if (!isset($_SESSION['userId']) || ($_GET['cid']) == "") {
		header("Location:forumTest.php");
		exit();
	}
	$cid = $_GET['cid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="This is the official website of the Western Bulls Rugby club. The club is based in Kakamega 
	town, in western Kenya and is registered and recognized by the Kenya Rugby Union, participating in Kenya's top-flight 7s and 15s
	leagues">
	<meta name="keywords" content="Bulls Rugby, Western Bulls, Kenya rugby, Western Kenya">
	<meta name="author" content="Zack C. Kaguluka">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/docs.min" >
	<title>forum test</title>
</head>
<body style="background: lightskyblue">
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<img src="images/logo.jpg" class="navbar-brand" width="120" height="90" alt="Western Bulls Rugby">
			</div>
					
			<div class="collapse navbar-collapse" id="mainNavBar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.html">Bulls Rugby</a></li>				
					<li><a href="ticket_info.html">Ticket Info</a></li>
					<li><a href="fanzone.html">Fan Zone</a></li>				
					<li><a href="about_us.html">About Us</a></li>			
					<li><a href="http://localhost/BullsShop/" target=”_blank”>Shop</a></li>		
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							More<span class="glyphicon glyphicon-circle-arrow-down"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
							<li><a href="FAQs.html">FAQs</a></li>
							<li><a href="contact_us.html">Contact Us</a></li>
							<li><a href="our_staff.html">Our Team</a></li>
							<li><a href="our_Patners.html">Our Patners</a></li>
						</ul>
					</li>

				</ul>				
			</div>
		</nav>
		<style type="text/css">
			margin-bottom: 50px
		</style>
	</header>
	<div class="container" style="background: aquamarine">
		<p>1</p><p>2</p><p>3</p>
				
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="well">
					<!--call to action for loging in to the forum-->
					<?php 
						echo "<p>You are logged in as ".$_SESSION['userName']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='forumLogout.php' id='forumLoginButton' name='forumLoginButton' class='btn btn-info btn-xs'>Log out</a></p><br />";
						
					?>
				</div>
			</div>
			
			<hr />

			<!--call to action for adding a topic to a category-->
			<div class="row">
				<div class="col-xs-10 col-md-10 col-xs-offset-1 col-md-offset-1" style="background: lightskyblue; margin-bottom: 20px; ">
					
					<h4><strong>Submit topic here</strong></h4>

					<form action="createTopicValidation.php" method="post" id="forumTopicCreationForm"
					 class="form-horizontal">
						<div class="form-group">
							<label for="Name">Topic Title</label> 
							<input type="text" id="forumTopicTitle" name="forumTopicTitle" class="form-control" placeholder="username e.g. JohnnyWalker">&nbsp;
						</div>
						<div class="form-group">
							<label for="topicContent">Topic Content</label>
							<textarea class="form-control" id="forumTopicContent" name="forumTopicContent" rows="3" placeholder="Your topic content goes here"></textarea>
							<input type="hidden" name="cid" value="<?php echo($cid) ?>">	
						</div>&nbsp;
																
						<button type="submit" id="forumTopicCreationButton" name="forumTopicCreationButton" class="btn btn-info">Create topic</button>					
					</form>
					
				</div>				
			</div>

			<div class="col-xs-12 col-md-12">
				<div class="panel panel-info">	
					<div class="panel-heading">
						<h2 class="panel-title" align="center">The Bulls Forum: Topics<br></h2>
					</div>
					<div class="panel-body">						

						<p align="center">The interactive wall for pips to post topics and opinions goes here</p>
						

						
				</div>										
			</div>
		
		</div>
					
	</div>
	
	<div class="row" >
		<footer class="navbar navbar-inverse" id="footer">
							
			<div class="col-sm-4 col-md-4">
				<p class="navbar-text">&copy; 2016 Western Bulls Rugby <br>
				Site built by Zack C. Kaguluka <br>
							
			</div>
			<div class="col-sm-6 col-md-6">
			</div>
			<div class="col-sm-2 col-md-2">
				<a class="scrolloTop" href="#">Back to top</a><br>
				<a href="terms_n_conditions.html">Terms & Conditions</a><br> 
				<a href="privacy_policy.html">Privacy Policy</a>
				<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				 -->
			</div>
				
		</footer>
	</div>

	<script src="js/jquery.min.js">	</script>
	<script script src="js/bootstrap.min.js" >	</script>
</body>
</html>
