<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" >
	<link href="scss/CreateAccountPage.css" type="text/css" rel="stylesheet" >
	<link href="scss/header.css" type="text/css" rel="stylesheet" >
</head>
<!-- navigation bar -->
<div class="topnav">
  <a href="browseTheatres.php">Browse Theatres</a>
</div>
<body>

<h1>Login or sign up!</h1>

	<form class="accountForm" action="/CMPE332-Project/ProfilePage.php" method="post">
		<label for="email">Email address</label>
        <input class="input-box" type="text" name="email" placeholder="Email">
		<br>
		<label for="pwrd">Password</label>
        <input class="input-box" type="password" name="pwrd" placeholder="Password">
		<br>
		<button type="submit" class="btn btn-default">Login</button>
		
		
	</form>
<?php
        session_unset(); 

// destroy the session 
session_destroy();

session_start();

if ($_SESSION["failed"] == "yes"){
	echo "Invalid Login Info!"; 
}
?>


<br>
<a class="centre" href = "CreateAccountPage.php">Don't have an account? Sign Up! </a>

</body>
</html>
