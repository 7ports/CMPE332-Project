<!DOCTYPE html>
<html>
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
