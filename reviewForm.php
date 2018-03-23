<!DOCTYPE html>
<html>
<body>

<h1>MovieTheaters</h1>
<a href = "browseTheatres.html">Browse Movies </a>

<h1>ReviewForm</h1>

<?php
session_start();
$_SESSION["accnum"] = "0";
?>
<form action = "/CMPE332-Project/reviewsubmission.php" method = "post" id = "reviewform">
  Movie: <input type = "text" name = "movie">
  <br>
  Rating:  <input type="radio" name="rating" value="1"> 1 <input type="radio" name="rating" value="2"> 2 <input type="radio" name="rating" value="3"> 3 <input type="radio" name="rating" value="4"> 4 <input type="radio" name="rating" value="5"> 5
  <br>
  Comments: <br><textarea rows="4" cols="50" name="comment"></textarea><br>
  <input type = "submit">
</form>


</body>
</html>
