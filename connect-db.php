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

//$dbh = new PDO('mysql:host=localhost;dbname=MovieTheatres',"root","root"); // for Sar
// change to 
<<<<<<< HEAD
 $dbh = new PDO('mysql:host=localhost;dbname=movietheatres', "root", ""); //for Nat
=======
// $dbh = new PDO('mysql:host=localhost;dbname=movietheatres', "root", ""); //for Nat
>>>>>>> 5268cfbf34cd31d78c70a383200e3edb85fb90bb
// change to 
 $dbh = new PDO('mysql:host=localhost;dbname=movietheaters', "root", ""); //for Raj

?>


