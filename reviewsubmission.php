<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>
<a href = "reviewForm.php">Leave a Review</a>




<?php
session_start();
$moviename = $_POST["movie"];
$rating = $_POST["rating"];
$comments = $_POST["comment"];
$accnum = $_SESSION["accnum"];

<<<<<<< HEAD
echo "<br>";
echo "Movie: $moviename<br>";
echo "Rating: $rating<br>";
echo "Comments: $comments<br>";
echo "Account: $accnum<br>";
echo "Review ID: ".rand();
=======
echo $moviename;
echo $rating;
echo $comments;
echo $accnum;
echo rand(10000,99999);
>>>>>>> 328ec593d1a54e37c357e0923c60ad0b64c62be3

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
