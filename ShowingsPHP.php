<!--Create and Edit Showings Page-->

<!DOCTYPE html>
<html>
    <body>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >
        <a href = "AdminPage.php">Back to Admin Portal </a>

        <?php
        session_start();
        $movieTitle = $_POST["showingTitle"];
        $numSeatsAvailable = $_POST["numSeatsAvailable"];
        $theatreID = $_POST["theatreID"];
        $startTime = $_POST["showingStartTime"];
        $startDate = $_POST["showingStartDate"];
        
    
        include('connect-db.php');
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try{
            $dbh->exec("DELETE FROM showing WHERE startTime='$startTime'");
            echo "Record updated successfully";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }try{
            $dbh->exec("INSERT INTO showing (`movieTitle`, `numSeatsAvailable`, `theatreID`, `startTime`, `startDate`) VALUES ('$movieTitle', '$numSeatsAvailable', '$theatreID', '$startTime', '$startDate')");
            echo "Record updated successfully";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }

        ?>

    </body>
</html>