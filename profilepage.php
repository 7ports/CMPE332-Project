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
<body>

<h1>Your Profile</h1>




<?php
session_start();
$email = $_POST["email"];
$password = $_POST["pwrd"];

<<<<<<< HEAD
=======

>>>>>>> 328ec593d1a54e37c357e0923c60ad0b64c62be3
if($email == NULL){
	echo "using session";
	$email = $_SESSION["email"];
	$password = $_SESSION["pwrd"];
}
<<<<<<< HEAD


//$dbh = new PDO('mysql:host=localhost;dbname=movietheaters',"root","");
=======


<<<<<<< HEAD
=======

//$dbh = new PDO('mysql:host=localhost;dbname=movietheaters',"root","");

>>>>>>> 328ec593d1a54e37c357e0923c60ad0b64c62be3
include('connect-db.php');



>>>>>>> 168840f373f90f7d44db434bc0fc3502480a0111
try{
$rows = $dbh->query("SELECT Fname, Lname, addressNum, Street, City, Prov, Country, PC, phoneNumber, AccountNum, Password, creditCardNum, creditCardExpiryDate FROM customer WHERE Email = '$email'");
} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
}
foreach($rows as $row){
$_SESSION["Fname"] = $row[0];
$_SESSION["Lname"] = $row[1];
$_SESSION["addressNum"] = $row[2];
$_SESSION["Street"] = $row[3];
$_SESSION["City"] = $row[4];
$_SESSION["Prov"] = $row[5];
$_SESSION["Country"] = $row[6];
$_SESSION["PC"] = $row[7];
$_SESSION["phoneNumber"] = $row[8];
$_SESSION["AccountNum"] = $row[9];
$_SESSION["Password"] = $row[10];
$_SESSION["creditCardNum"] = $row[11];
$_SESSION["creditCardExpiryDate"] = $row[12];	
}
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

try{
$rows = $dbh->query("SELECT Fname, Lname, addressNum, Street, City, Prov, Country, PC, phoneNumber, AccountNum, Password, creditCardNum, creditCardExpiryDate FROM customer WHERE Email = '$email'");
} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
}

if ($rows->fetchColumn(10) != $password){
	$_SESSION["failed"] = "yes";
	header("Location:openingpage.php");
	exit;
} 

<<<<<<< HEAD


=======
>>>>>>> 168840f373f90f7d44db434bc0fc3502480a0111
$_SESSION["email"] = $email;
$_SESSION["pwrd"] = $password;


	
$_SESSION["failed"] = "no";
	
?>

<h2>Your Info</h2>
<table>
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

<a href = "changeprofile.php">Edit Your Profile</a>

<h3>Your Reservations</h3>
<table>
	<tr>
		<th>Time</th>
		<th>Date</th>
		<th>Movie</th>
		<th>Theatre</th>
		<th>Number of Tickets</th>
	</tr>
<?php
<<<<<<< HEAD
	
=======
>>>>>>> 168840f373f90f7d44db434bc0fc3502480a0111

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
<<<<<<< HEAD
	
	
=======
>>>>>>> 168840f373f90f7d44db434bc0fc3502480a0111
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
<h3>Cancel a Rservation</h3>
<form action ="/CMPE332-Project/RemoveRes.php" method = "post">
	<label for="movietitle">Movie</label>
    <input type="text" name="movietitle" placeholder="Movie">
	<br>
	<label for="time">Start Time</label>
    <input type="time" name="time" placeholder="Time">
	<br>
	<label for="theatre">Theatre Name</label>
    <input type="text" name="theatre" placeholder="Theatre">
	<label for="theatrenum">Theatre Number</label>
    <input type="text" name="theatrenum" placeholder="Theatre Number">
	<br>
	<button type="submit" class="btn btn-default">Cancel Reservation</button>
</form>


</body>
<?php
	//$accnum = $_SESSION["accnum"]=$;
?>
</html>
