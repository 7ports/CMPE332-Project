<!DOCTYPE html>
<html>
<body>

<h1>Your Profile</h1>




<?php
$email = $_POST["email"];
$password = $_POST["pwrd"];


$dbh = new PDO('mysql:host=localhost;dbname=movietheaters',"root","");

try{
$rows = $dbh->query("SELECT Fname Lname addressNum Street City Prov Country PC phoneNumber AccountNum Password creditCardNum creditCardExpiryDate FROM customer WHERE Email = '$email'");
} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
}

echo $rows;


?>






</body>
</html>
