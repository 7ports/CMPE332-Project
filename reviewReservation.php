<!DOCTYPE html>
<html>
<head>
	<link href="scss/reviewForm.css" type="text/css" rel="stylesheet" >
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >
	<link href="scss/header.css" type="text/css" rel="stylesheet" >
</head>

<body>
<!-- navigation bar -->
<div class="topnav">
  <a href="reviewForm.php">Review a Movie</a>
  <a href="profilepage.php">Account</a>
  <a href="movie.php">Browse Movies</a>
  <a href="browseTheatres.php">Browse Theatres</a>
</div>

<body>

<h1>Rervation Confirmation</h1>

<a href = "makeReservation.php">Change Reservation</a>

<?php
session_start();
$startTime = $_SESSION["startTime"];
$startDate = $_SESSION["startDate"];
$theatreID = $_SESSION["theatreID"];

$movieTitle = $_SESSION["movieTitle"];
$numTickets = $_POST["numTickets"];
$accnum = $_SESSION["accnum"];

echo "<br>";
echo "Movie: $movieTitle<br>";
echo "startTime: $startTime<br>";
echo "start Date: $startDate<br>";
echo "TheatreID: $theatreID<br>";
echo "number Tickets: $numTickets<br>";
echo "Account: $accnum<br>";
//echo "Review ID: ".rand();

include('connect-db.php');

try{
$dbh->exec("INSERT INTO Reservation (`startTime`, `startDate`, `MovieTitle`, `TheatreID`, `AccountNum`, `numTickets`) VALUES ('$startTime', '$startDate', '$movieTitle', '$TheatreID','$accnum', '$numTickets')");
} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
}




?>

</body>
</html>
