<!DOCTYPE html>
<html>
<body>
<style>
#movies {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#movies td, #movies th {
    border: 1px solid #ddd;
    padding: 8px;
}

#movies tr:nth-child(even){background-color: #f2f2f2;}

#movies tr:hover {background-color: #ddd;}

#movies th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

<h1>My first PHP page</h1>
<a href = "browseTheatres.html">Browse Movies </a>

<h1>Made it!</h1>


<?php
# practice
echo "Hello World!!!!!"."<br>" ;
include('connect-db.php');

#$dbh = new PDO('mysql:host=localhost;dbname=MovieTheatres',"root","root");
$temp = "Some";
$rows = $dbh->query("select movie.startDate, movie.title, showing.startTime from movie inner join showing on title = movietitle");

#echo $rows;

foreach($rows as $row){
	echo "<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#ff0000'> $row[1] $row[0]   $row[2]  </div>";
}


$dbh = null;
?>
     <table id = "movies">
         <tr>
             <th>Name</th>
             <th>Date</th>
             <th>Time</th>
         </tr>
		<!--tr onclick="window.location='anotherPage.php';"-->
			<!--a href="anotherPage.php" --> 
            <?php
            $dbh = new PDO('mysql:host=localhost;dbname=MovieTheatres',"root","root");

            $rows = $dbh->query("select movie.startDate, movie.title, showing.startTime from movie inner join showing on title = movietitle");
            echo "<tr onclick="window.location='anotherPage.php';">";
  
            foreach($rows as $row){
				echo "<td>  $row[1] </td> <td>$row[0]  </td> <td>$row[2]  </td>";
			}
			echo "</tr>";
			?>
         <!-- /a -->
     </tr>
     </table>

</body>
</html>
