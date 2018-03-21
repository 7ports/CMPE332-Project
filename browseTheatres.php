<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>
<a href = "browseTheatres.html">Browse Movies </a>

<h1>Made it!</h1>


<?php
# practice
echo "Hello World!!!!!";

$dbh = new PDO('mysql:host=localhost;dbname=MovieTheatres',"root","root");
$temp = "Some";
$rows = $dbh->query("select Fname from Customer");
#echo $rows;


foreach($rows as $row){
	echo $row[0]."<br>";
}
?>

</body>
</html>
