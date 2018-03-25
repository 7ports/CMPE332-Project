<!--Create Movie PHP-->

<!DOCTYPE html>
<html>
    <body>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >

        <h1>PHP Page</h1>
        <a href = "AdminPage.php">Back to Admin Page</a>

        <?php
        session_start();

        $movieTitle = $_POST["movieTitle"];
        $runningTime = $_POST["runningTime"];
        $rating = $_POST["rating"];
        $plotSynopsis = $_POST["plotSynopsis"];
        $directorFName = $_POST["directorFName"];
        $directorLName = $_POST["directorLName"];
        $productionCompany = $_POST["productionCompany"];
        $startDate = $_POST["startDate"];
        $endDate = $_POST["endDate"];
        $supplierName = $_POST["supplierName"];

        #$dbh = new PDO('mysql:host=localhost;dbname=movietheatres', "root", "");
        include('connect-db.php');

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $dbh->exec("INSERT INTO `Movie` (`Title`, `RunningTime`, `Rating`, `PlotSynopsis`, `DirectorFName`, `DirectorLName`, `ProductionCompany`, `StartDate`, `EndDate`, `SupplierName`) VALUES ('$movieTitle', '$runningTime', '$rating', '$plotSynopsis', '$directorFName', '$directorLName', '$productionCompany', '$startDate', '$endDate', '$supplierName')");

            print "Success";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }



        ?>

    </body>
</html>