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



<h1>Browse Movies</h1>

<a href = "movie.php">Browse Movies </a>

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
				echo "<td>  <a href= '$row[1].php' >$row[1] </a></td> <td>$row[0]  </td> <td>$row[2]  </td>";
				echo "</tr>";
			}
			?>
     </tr>
     </table>
 


</body>
</html>
