<!DOCTYPE html>
<html>
<body>

<h1>Your Profile</h1>




<?php
session_start();
$email = $_POST["email"];
$password = $_POST["pwrd"];


$dbh = new PDO('mysql:host=localhost;dbname=movietheaters',"root","");

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
	
$_SESSION["failed"] = "no";
	
	
	
	






?>






</body>
</html>
