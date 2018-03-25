<?php

// server info
$server = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'MovieTheatres';

// connect to the database
#$mysqli = new mysqli($server, $user, $pass, $db);

// show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);

$dbh = new PDO('mysql:host=localhost;dbname=MovieTheatres',"root","root"); // for Sar
// change to 
// $dbh = new PDO('mysql:host=localhost;dbname=movietheatres', "root", ""); for Nat
// change to 
// $dbh = new PDO('mysql:host=localhost;dbname=movietheaters', "root", ""); for Raj

?>


