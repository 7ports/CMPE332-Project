<!DOCTYPE html>
<html>
<head>
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

<h1>Your Review:</h1>
<a href = "reviewForm.php">Go back and edit review</a>




<?php
session_start();
$moviename = $_POST["movie"];
$rating = $_POST["rating"];
$comments = $_POST["comment"];
$accnum = $_SESSION["accnum"];

echo "<br>";
echo "Movie: $moviename<br>";
echo "Rating: $rating<br>";
echo "Comments: $comments<br>";
echo "Account: $accnum<br>";
echo "Review ID: ".rand(10000,99999);

//echo $moviename;
//echo $rating;
//echo $comments;
//echo $accnum;
//echo rand(10000,99999)."<br>";

include('connect-db.php');

try{
$dbh->exec("INSERT INTO customerreview (ID, Rating, Text, CustomerAccountNum, MovieTitle) VALUES (rand(), '$rating', '$comments', '$accnum', '$moviename')");
} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
}




?>

</body>
</html>
