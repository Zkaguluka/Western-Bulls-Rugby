<?php session_start(); ?>
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
		<!--Section with the bulls forum-->
		<section>
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="panel panel-info">	
						<div class="panel-heading">
							<h2 class="panel-title" align="center">The Bulls Forum<br></h2>
	 					</div>
	 					<div class="panel-body">
	 						

							<p align="center">The interactive wall for pips to post topics and opinions goes here</p>

							<!--call to action for log in to the forum-->
							<?php 
								if (!isset($_SESSION['userId'])) {
									echo "<div class='row'>
											<div class='col-xs-12 col-md-12' style='background: lightskyblue; margin-bottom: 5px; padding-top: 10px;>
												<div class='text-center'>			
													<form action='forumLogin.php' method='post' id='forumLogin'
													 class='form-inline'>
														<div class='form-group'>
															<label for='loginName'>Username</label>
															<input type='text' id='forumLoginUserName' name='forumLoginUserName' class='form-control' placeholder='Johnny Walker'>&nbsp;
														</div>
														<div class='form-group'>
															<label for='loginPassword'>Password</label>
															<input type='password' class='form-control' id='forumLoginPassword' name='forumLoginPassword' placeholder='jw@example.com'>&nbsp;
														</div>						
																									
														<button type='submit' id='forumLoginButton'
														name='login' class='btn btn-info btn-xs'>Log in</button>
														<p></p>
													</form>
												</div>						
											</div>				
										</div>";
										echo "<!--call to action for registration to the forum-->
										<div class='col-xs-8 col-md-8 col-xs-offset-2 col-md-offset-2' style='background: lightskyblue; margin-bottom: 5px; '>
											<div class='text-center'>
												<h4><strong> Not yet a member of the forum? Register here!</strong></h4>

												<form action='forumRegistration.php' method='post' id='forumRegistrationForm'
												 class='form-inline'>
													<div class='form-group'>
														<!-- <label for='Name'>Username</label> -->
														<input type='text' id='forumUserName' name='forumUserName' class='form-control' placeholder='username e.g. JohnnyWalker'>&nbsp;
													</div>
													<div class='form-group'>
														<!-- <label for='Password'>Password</label> -->
														<input type='password' class='form-control' id='forumPassword' name='forumPassword' placeholder='Password'>&nbsp;
													</div>
													<div class='form-group'>
														<!-- <label for='passwordConfirmation'>Confirm Password</label> -->
														<input type='password' class='form-control' id='forumPasswordConfirmation' name='forumPasswordConfirmation' placeholder='Confirm Password'>&nbsp;
													</div>
													<div class='form-group'>
																	<!-- <label for='email'>E-mail address</label> -->
																	<input type='text' class='form-control' id='forumUserEmail' name='forumUserEmail' placeholder='email e.g. jw@example.com'>&nbsp;
																</div>
													
													<button type='submit' id='forumRegistrationButton'
													name='register' class='btn btn-info'>Sign up</button>
													<p></p>
												</form>
											</div>						
										</div>				
									</div>";
										
								}
								else{
									echo "<p> Welcome to the forum ".$_SESSION['userName']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='forumLogout.php' id='forumLoginButton' name='forumLoginButton' class='btn btn-info btn-xs'>Log out</a></p><br /> <hr />";
									

									include_once("connectToDb.php");

									$fillCategoriesQuery = "SELECT *FROM forumcategories ORDER BY categoryTitle ASC";
									$result = mysqli_query($connect, $fillCategoriesQuery);
									$categories = "";

									if (mysqli_num_rows($result) > 0) {
										while ($row = mysqli_fetch_assoc($result)) {
											$cid = $row['id'];
											$title = $row['categoryTitle'];
											$description = $row['categoryDescription'];

											$categories .= "<a href='viewForumCategories.php?cid=".$cid."'>".$title." : <font size'-1'>".$description."<br /></a>";

										}
										echo $categories;
									}
									else{
										echo "There are no categories available yet.";
									}									 
								}

							 ?>						

	 					</div>
					</div>
				</div>
							
		</section>		
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
				<a class="scroltoTop" href="#">Back to top</a><br>
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
