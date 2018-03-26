<!DOCTYPE html>
<html>
<head>
	<link href="scss/header.css" type="text/css" rel="stylesheet" >
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" >
</head>
<!-- navigation bar -->
<div class="topnav">
  <a href="reviewForm.php">Review a Movie</a>
  <a href="profilepage.php">Account</a>
  <a href="movie.php">Browse Movies</a>
</div>
<style>
#moviesi {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#moviesi td, #moviesi th {
    border: 1px solid #ddd;
    padding: 5px;
}

#moviesi tr:nth-child(even){background-color: #f1f1f1;}

#moviesi th {
    padding-top: 7px;
    padding-bottom: 7px;
    text-align: left;
    background-color: #333;
    color: white;
}

#movies {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#movies td, #movies th {
    border: 1px solid #ddd;
    padding: 8px;
}

#movies tr:nth-child(even){background-color: #f1f1f1;}

#movies tr:hover {background-color: #ddd;}

#movies th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #E51515;
    color: white;
}
</style>


	<?php
	session_start();
	$accnum = $_SESSION["accnum"];
	$email = $_SESSION["email"];
	$password = $_SESSION["password"];


		include('connect-db.php');
		$rows = $dbh->query("select distinct movie.title, showing.theatreID, theatre.complexName from movie inner join showing on title = movietitle inner join theatre on theatreID = ID");

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
 		$rows = $dbh->query("select distinct theatre.complexName from movie inner join showing on title = movietitle inner join theatre on theatreID = ID"); 
            foreach($rows as $row){
            	echo "<button class=\"w3-bar-item w3-button tablink\" onclick=\"openLink(event, '$row[0]')\">";
				echo "$row[0]";
				echo "</button>";
			}
		$rows->execute();

			?>

            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Movies')">All Movies</button>

        </div>

        <div style="margin-left:130px">
		<!-- FIRST MOVIE ENTRY -->
			<?php 
			//$test = $rows->fetch(PDO::FETCH_ASSOC);
			while($test = $rows->fetch(PDO::FETCH_ASSOC)){

				$complex = $test['complexName'];
				echo "<div id=\"$complex\"class=\"w3-container city w3-animate-opacity\" style=\"display:none\">"; 
				echo "<h1>$complex</h1>";
					$titles = $dbh->query("select distinct showing.movieTitle from movie inner join showing on title = movietitle inner join theatre on theatreID = ID where complexName=\"$complex\" ");
					//$showings = $dbh->query("select distinct showing.startTime, showing.startDate, showing.movieTitle, showing.theatreID, theatre.complexName from movie inner join showing on title = movietitle inner join theatre on theatreID = ID where title=\"$title\" ");
					echo "<h2>Show Times</h2>";
				foreach($titles as $title){

					echo "<h1>$title[0]</h1>";
					// Display movie info
					$rating = $dbh->query("select avg(customerReview.rating), title, runningTime, movie.rating, directorFname, directorLname from movie left join customerReview on title=movieTitle 
						where title=\"$title[0]\"
						group by title");
					//print_r($rating);
					echo "<table id = \"moviesi\">
			         <tr>
			             <th>Name</th>
			             <th>Customer Rating</th>
			             <th>Runtime</th>
			             <th>Rating</th>
			             <th>Director</th>
			         </tr>";
					foreach($rating as $rat){
						//echo "<p>Customer Rating: $rat[0]</p>";
						echo "<tr>";
						echo "<td> $rat[1]  </td> <td>  $rat[0] </td> <td>  $rat[2] min</td> <td>  $rat[3] </td> <td>  $rat[4] $rat[5]</td>";
						echo "</tr>";
					}
					echo "</tr>
     					</table>";
					//echo "<p>Customer Rating: $rating</p>";
					$showings = $dbh->query("select distinct showing.startTime, showing.startDate, showing.movieTitle, showing.theatreID, theatre.complexName from movie inner join showing on title = movietitle inner join theatre on theatreID = ID where title=\"$title[0]\" AND complexName=\"$complex\" ");

					echo "<h2>Show Times</h2>";
					echo "<table id = \"movies\">
					<tr>
			             <th>Time</th>
			             <th>Location</th>
			        </tr>";

					foreach($showings as $show){
						echo "<tr>";
						echo "<td> $show[0] <a href=\"makeReservation.php?showTime=$show[0]&startDate=$show[1]
						&movietitle=$show[2]&theatreID=$show[3]\"> Reserve tickets</a> </td> <td> $show[4] </td>";
						echo "</tr>";

					}
					echo "
 					</table>";
					//$_SESSION["showTime"] = $show[0];
				} // end foreach title
			echo "</div>";
			} // end while			
			?>
			<!--/div-->
            <!-- NEXT MOVIE ENTRY -->
			
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
        </div>

    </body>
</html>