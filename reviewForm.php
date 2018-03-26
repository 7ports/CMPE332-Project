<!DOCTYPE html>
<html>
<head>
	<link href="scss/reviewForm.css" type="text/css" rel="stylesheet" >
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >
	<link href="scss/header.css" type="text/css" rel="stylesheet" >
</head>

<body>
<!-- navigation bar -->
<div class="topnav">
  <a href="reviewForm.php">Review a Movie</a>
  <a href="profilepage.php">Account</a>
  <a href="movie.php">Browse Movies</a>
</div>


<h1>MovieTheaters</h1>

<h1>ReviewForm</h1>

<?php
session_start();
?>
<form class = "reviewMovie" action = "/CMPE332-Project/reviewsubmission.php" method = "post" id = "reviewform">
    <label for="Movie">Movie</label>
	<input type = "text" class="form-control" name = "movie">
	  <br>
	  <label for="rating">Rating</label>
	  <br>
	  <input type="radio" name="rating" value="1"> 1 <input type="radio" name="rating" value="2"> 2 <input type="radio" name="rating" value="3"> 3 <input type="radio" name="rating" value="4"> 4 <input type="radio" name="rating" value="5"> 5
	  <br>
	  <label for="comment">Comment</label><br><textarea rows="4" class="form-control" cols="50" name="comment"></textarea><br>
	  <input type = "submit">
</form>


</body>
</html>
