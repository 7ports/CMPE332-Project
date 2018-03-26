<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >
        <a href = "AdminPage.php">Back to Admin Portal </a>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color: #4CAF50;
                color: white;
            }
        </style>
            </head>
    <table>
        <thead>
            <tr>
                <th>Time</th>
                <th>Date</th>
                <th>Movie</th>
                <th>Theatre</th>
                <th>Number of Tickets</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('connect-db.php');
            $accountNum = $_POST["reservationHistory"];
            try{
                $check = $dbh->query("SELECT AccountNum FROM customer WHERE accountNum = '$accountNum'");
            } catch(PDOexception $e){
                print "Error!: " . $e->getMessage()."<br/>";
                die();
            }

            foreach($check as $checks){
                $accnum = $checks[0];
            }

            try{
                $rows = $dbh->query("SELECT distinct startTime, startDate, MovieTitle, TheatreNum, ComplexName, numTickets FROM reservation INNER JOIN theatre on theatreID=ID WHERE AccountNum = '$accnum'");
            } catch(PDOexception $e){
                print "Error!: " . $e->getMessage()."<br/>";
                die();
            }

            foreach($rows as $row){
                echo "<tr>
		<td>".$row[0]."</td>
		<td>".$row[1]."</td>
		<td>".$row[2]."</td>
		<td>"."Number ".$row[3]." At ".$row[4]."</td>
		<td>".$row[5]."</td>
	</tr>";
            }
            ?>
        </tbody>

    </table>
</html>