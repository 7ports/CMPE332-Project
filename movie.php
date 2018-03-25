<!DOCTYPE html>
<html>
<head>
<style>
* {
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #333;
}

/* Style the topnav links */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Style the content */
.content {
    background-color: #ddd;
    padding: 10px;
    height: 200px; /* Should be removed. Only for demonstration */
}

/* Style the footer */
.footer {
    background-color: #f1f1f1;
    padding: 10px;
}
</style>

</head>
<div class="topnav">
  <a href="browseTheatres.php">Browse Theatres</a>
  <a href="CreateAccountPage.php">Create Account</a>
  <a href="reviewForm.php">Review a Movie</a>
</div>


	<?php
	    session_start();

		include('connect-db.php');
		$rows = $dbh->query("select movie.startDate, movie.title, showing.startTime from movie inner join showing on title = movietitle");


	    $_SESSION["failed"] = "no";
    ?>

<title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <script>
            function openLink(evt, animName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("city");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
                }
                document.getElementById(animName).style.display = "block";
                evt.currentTarget.className += " w3-red";
            }
        </script>

        <div class="w3-sidebar w3-bar-block w3-black w3-card" style="width:130px">
            <h5 class="w3-bar-item">Menu</h5>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Members')">Members</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Movies')">Movies</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Theatres')">Movie Theatres</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Complexes')">Movie Complexes</button>
        </div>
                <div style="margin-left:130px">

            <div id="Members" class="w3-container city w3-animate-opacity" style="display:none">
                <h2>Manage Members</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Account Number</th>
                            <th>Delete Account</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>

            </div>

            <div id="Movies" class="w3-container city w3-animate-left" style="display:none">
                <h2>Manage Movies</h2>
                <p>Paris is the capital of France.</p> 
                <p>The Paris area is one of the largest population centers in Europe, with more than 12 million inhabitants.</p>
            </div>

            <div id="Theatres" class="w3-container city w3-animate-top" style="display:none">
                <h2>Manage Movie Theatres</h2>
                <p>Tokyo is the capital of Japan.</p>
                <p>It is the center of the Greater Tokyo Area, and the most populous metropolitan area in the world.</p>
            </div>

            <div id="Complexes" class="w3-container city w3-animate-right" style="display:none">
                <h2>Manage Movie Complexes</h2>
                <p>London is the capital city of England.</p>
                <p>It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
            </div>
        </div>

    </body>
</html>