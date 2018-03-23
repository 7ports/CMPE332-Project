<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>
<a href = "reviewForm.php">Leave a Review </a>

<h1>Made it!</h1>


<?php
session_start();
$moviename = $_POST["movie"];
$rating = $_POST["rating"];
$comments = $_POST["comment"];
$accnum = $_SESSION["accnum"];

echo $moviename;
echo $rating;
echo $comments;
echo $accnum;
echo rand();

$dbh = new PDO('mysql:host=localhost;dbname=movietheaters',"root","");

try{
$dbh->exec("INSERT INTO customerreview (ID, Rating, Text, CustomerAccountNum, MovieTitle) VALUES (rand(), '$rating', '$comments', '$accnum', '$moviename')");
} catch(PDOexception $e){
	print "Error!: " . $e->getMessage()."<br/>";
	die();
}




?>

</body>
</html>
