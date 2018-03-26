<!DOCTYPE html>
<html>
<head>
	<link href="scss/header.css" type="text/css" rel="stylesheet" >
</head>
<!-- navigation bar -->
<div class="topnav">
  <a href="browseTheatres.php">Browse Theatres</a>
  <a href="profilepage.php">Account</a>
    <a href="movie.php">Movies</a>

  <a href="reviewForm.php">Review a Movie</a>
</div>
<style>
#info {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#info td, #info th {
    border: 1px solid #ddd;
    padding: 8px;
}

#info tr:nth-child(even){background-color: #f1f1f1;}

#info tr:hover {background-color: #ddd;}

#info th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #333;
    color: white;
}
</style>

<body>

<h1>Your Profile</h1>




<?php
session_start();
$email = $_POST["email"];
$password = $_POST["pwrd"];

if($email == NULL){
	$email = $_SESSION["email"];
	$password = $_SESSION["pwrd"];
}

include('connect-db.php');



try{
$rows = $dbh->query("SELECT Fname, Lname, addressNum, Street, City, Prov, Country, PC, phoneNumber, AccountNum, Password, creditCardNum, creditCardExpiryDate FROM customer WHERE Email = '$email'");
} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
}

if($rows->rowCount() == 0){
	$_SESSION["failed"] = "yes";
	header("Location:openingpage.php");
	exit;
}

if ($rows->fetchColumn(10) != $password){
	$_SESSION["failed"] = "yes";
	header("Location:openingpage.php");
	exit;
} 

$_SESSION["email"] = $email;
$_SESSION["pwrd"] = $password;


	
$_SESSION["failed"] = "no";
	
?>

<h2>Your Info</h2>
<table id="info">
	<tr>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>Account Number</th>
		<th>Credit Card</th>
		<th>Email</th>
	</tr>
	<?php
	

	//$dbh = new PDO('mysql:host=localhost;dbname=movietheaters',"root","");


	include('connect-db.php');


	try{
	$rows = $dbh->query("SELECT Fname, Lname, addressNum, Street, City, Prov, Country, PC, phoneNumber, AccountNum, Password, creditCardNum, creditCardExpiryDate FROM customer WHERE Email = '$email'");
	} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
	}
	
	foreach($rows as $row){
	echo "<tr>
		<td>".$row[0]."</td>
		<td>".$row[1]."</td>
		<td>".$row[2]." ".$row[3]." ".$row[4]." ".$row[5]." ".$row[6]." ".$row[7]."</td>
		<td>".$row[8]."</td>
		<td>".$row[9]."</td>
		<td>".$row[11]."</td>
		<td>".$email."</td>
	</tr>";
	}
	?>
</table>
<h3>Your Reservations</h3>
<table id="info">
	<tr>
		<th>Time</th>
		<th>Date</th>
		<th>Movie</th>
		<th>Theatre</th>
		<th>Number of Tickets</th>
	</tr>
<?php

	//$dbh = new PDO('mysql:host=localhost;dbname=movietheaters',"root","");


	include('connect-db.php');


	try{
	$check = $dbh->query("SELECT AccountNum FROM customer WHERE Email = '$email'");
	} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
	}
	
	foreach($check as $checks){
		$accnum = $checks[0];
	}
	$_SESSION["accnum"] = $accnum;
	try{
	$rows = $dbh->query("SELECT startTime, startDate, MovieTitle, TheatreNum, ComplexName, numTickets FROM reservation INNER JOIN theatre WHERE AccountNum = '$accnum'");
	} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
	}

	
	foreach($rows as $row){
	echo "<tr>
		<td>".$row[0]."</td>
		<td>".$row[1]."</td>
		<td>".$row[2]."</td>
		<td>"."Number ".$row[3]." At ".$row[4]."</td>
		<td>".$row[5]."</td>
	</tr>";
	}
	?>
</table>



</body>
<?php
	//$accnum = $_SESSION["accnum"]=$;
?>
</html>
