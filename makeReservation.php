<!DOCTYPE html>
<html>
<head>
	<link href="scss/header.css" type="text/css" rel="stylesheet" >
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" >
	<link href="scss/CreateAccountPage.css" type="text/css" rel="stylesheet" >
</head>
<!-- navigation bar -->
<div class="topnav">
  <a href="reviewForm.php">Review a Movie</a>
  <a href="profilepage.php">Account</a>
  <a href="movie.php">Browse Movies</a>
</div>


<?php
	session_start();
	$startTime = $_GET["showTime"];
	$startDate = $_GET["startDate"];
	$movieTitle = $_GET["movietitle"];
	$theatreID = $_GET["theatreID"];
	
	//echo "<form action = \"reviewReservation.php\" method = \"post\" id = \"movieform\">";
	$_SESSION["startTime"]=$startTime;
	$_SESSION["movieTitle"]=$movieTitle;
	$_SESSION["startDate"]=$startDate;
	$_SESSION["theatreID"]=$theatreID;
	$accnum = $_SESSION["accnum"];


?>
<form class = "reserveTickets" action = "/CMPE332-Project/reviewReservation.php" method = "post" id = "reviewform">

	<input type = "text" class="number-box" name = "numTickets">
  <input type = "submit">
</form>

