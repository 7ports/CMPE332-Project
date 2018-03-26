<!DOCTYPE html>
<html>
<body>

<h1>Login or sign up!</h1>

	<form action="/CMPE332-Project/ProfilePage.php" method="post">
		<label for="email">Email address</label>
        <input type="text" name="email" placeholder="Email">
		<br>
		<label for="pwrd">Password</label>
        <input type="password" name="pwrd" placeholder="Password">
		<br>
		<button type="submit" class="btn btn-default">Login</button>
		
		
	</form>
<?php
session_start();

if ($_SESSION["failed"] == "yes"){
	echo "Invalid Login Info!"; 
}
?>


<br>
<a href = "CreateAccountPage.php">Don't have an account? Sign Up! </a>

</body>
</html>
