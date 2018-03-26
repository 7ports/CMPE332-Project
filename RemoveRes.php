<!DOCTYPE html>
<html>
<head>
	<link href="scss/header.css" type="text/css" rel="stylesheet" >
</head>
<body>

<?php
include('connect-db.php');
session_start();
$movie = $_POST["movietitle"];
$time = $_POST["time"];
$theatre = $_POST["theatre"];
$number = $_POST["theatrenum"];
$accnum = $_SESSION["accnum"];


echo $movie;
echo $time;
echo $theatre;
echo $number;
echo $accnum;

try{
$rows = $dbh->query("SELECT ID FROM theatre WHERE ComplexName = '$theatre' AND TheatreNum ='$number'");
} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
}
foreach ($rows as $row){
$ident = $row[0];
}

echo $ident;
try{
$rows = $dbh->exec("DELETE FROM reservation WHERE startTime='$time' AND movieTitle='$movie' AND accountNum='$accnum' AND TheatreID = '$ident'");
} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
}

	header("Location:profilepage.php");
	exit;

?>



</body>
</html>