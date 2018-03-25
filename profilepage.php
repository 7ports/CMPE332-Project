<!DOCTYPE html>
<html>
<body>

<h1>Your Profile</h1>




<?php
session_start();
$email = $_POST["email"];
$password = $_POST["pwrd"];


$dbh = new PDO('mysql:host=localhost;dbname=movietheatres',"root","");

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
	<tr>
		<td><?php echo $rows->fetchColumn(0) ?></td>
		<td><?php echo $rows->fetchColumn(1) ?></td>
		<td><?php echo $rows->fetchColumn(2) . $rows->fetchColumn(3) . $rows->fetchColumn(4) . $rows->fetchColumn(5) . $rows->fetchColumn(6) . $rows->fetchColumn(7)?></td>
		<td><?php echo $rows->fetchColumn(8) ?></td>
		<td><?php echo $rows->fetchColumn(9) ?></td>
		<td><?php echo $rows->fetchColumn(11) ?></td>
		<td><?php echo $email ?></td>
	</tr>
</table>












</body>
</html>
