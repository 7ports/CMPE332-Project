<!DOCTYPE html>
<html>
<head>
	<link href="scss/header.css" type="text/css" rel="stylesheet" >
</head>
<!-- navigation bar -->
<div class="topnav">
  <a href="browseTheatres.php">Browse Theatres</a>
  <a href="CreateAccountPage.php">Create Account</a>
  <a href="profilepage.php">Account</a>
  <a href="reviewForm.php">Review a Movie</a>
</div>


	<?php
	session_start();
	$accnum = $_SESSION["accnum"];
	$email = $_SESSION["email"];
	$password = $_SESSION["password"];


		include('connect-db.php');
		$rows = $dbh->query("select distinct movie.startDate, movie.title from movie inner join showing on title = movietitle");

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
            <?php
			include('connect-db.php');

            //$rows = $dbh->query("select movie.startDate, movie.title, showing.startTime from movie inner join showing on title = movietitle");
  
            foreach($rows as $row){
            	echo "<button class=\"w3-bar-item w3-button tablink\" onclick=\"openLink(event, '$row[1]')\">";
				echo "$row[1]";
				echo "</button>";
			}
					$rows->execute();

		$test = $rows->fetch(PDO::FETCH_ASSOC);

		$title    = $test['title'];
		//$name  = $test[1];
		//$email = $test[2];
		//print_r($test);
		//echo "<h1>$id</h1>";
			?>

            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Members')">Members</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Movies')">All Movies</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Theatres')">Movie Theatres</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Complexes')">Movie Complexes</button>
        </div>
                <div style="margin-left:130px">
			<?php 
			echo "<div id=\"$title\"class=\"w3-container city w3-animate-opacity\" style=\"display:none\">"; 

			?>
            <!--div id="The Movie Movie" class="w3-container city w3-animate-opacity" style="display:none"-->
                <h2>Put info about movie here</h2>

                <table>
                    <thead>
                        <tr>
                            <th>buy tix</th>
                            <th>Lastname</th>
                            <th>Account Number</th>
                            <th>Delete Account</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>

            </div>
            <!-- NEXT MOVIE ENTRY -->
			<?php 
			$test = $rows->fetch(PDO::FETCH_ASSOC);

			$title = $test['title'];
			echo "<div id=\"$title\"class=\"w3-container city w3-animate-opacity\" style=\"display:none\">"; 
			echo "<h1>$title</h1>";
				$showings = $dbh->query("select distinct showing.startTime, showing.startDate, showing.movieTitle, showing.theatreID from movie inner join showing on title = movietitle where title=\"$title\"");
				echo "<h2>Show Times</h2>";
				foreach($showings as $show){
					echo "$show[0] <a href=\"makeReservation.php?showTime=$show[0]&startDate=$show[1]
					&movietitle=$show[2]&theatreID=$show[3]\">Reserve tickets </a> <br>";
				}
				$_SESSION["showTime"] = $show[0];


			?>
			</div>

			<!-- NEXT MOVIE ENTRY -->
			<?php 
			$test = $rows->fetch(PDO::FETCH_ASSOC);

			$title = $test['title'];
			echo "<div id=\"$title\"class=\"w3-container city w3-animate-opacity\" style=\"display:none\">"; 
			echo "<h1>$title</h1>";
				$showings = $dbh->query("select distinct startTime,numSeatsAvailable, TheatreID from movie inner join showing on title = movietitle where title=\"$title\"");
				echo "<h2>Show Times</h2>";
				foreach($showings as $show){
					echo "$show[0] <a href=\"makeReservation.php?showTime=$show[0]&startDate=$show[1]
					&movietitle=$show[2]&theatreID=$show[3]\">Reserve tickets</a> <br>";
				}
			?>
			</div>

            <div id="Movies" class="w3-container city w3-animate-left" style="display:none">

             <table id = "movies">
		         <tr>
		             <th>Name</th>
		             <th>Date</th>
		             <th>Time</th>
		         </tr>
				<!--tr onclick="window.location='anotherPage.php';"-->
		            <?php
					include('connect-db.php');

		            $rows = $dbh->query("select movie.startDate, movie.title, showing.startTime from movie inner join showing on title = movietitle");
		  
		            foreach($rows as $row){
		            	echo "<tr>";
						echo "<td>  <a onclick=\"openLink(event, '$row[1]')\">$row[1] </a></td> <td>$row[0]  </td> <td>$row[2]  </td>";
						echo "</tr>";
					}
					?>
				  </tr>
			  </table> 
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