<!--Create and Edit Movie Theatres-->

<!DOCTYPE html>
<html>
    <body>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >

        <h1>PHP Page</h1>
        <a href = "AdminPage.php">Back to Admin Portal </a>

        <?php
        session_start();
        $theatreNum = $_POST["theatreNum"];
        $seatCapacity = $_POST["seatCapacity"];
        $screenSize = $_POST["screenSize"];
        $id = $_POST["id"];
        $complexName = $_POST["complexName"];
        $addressNum = $_POST["theatreAddressNum"];
        $complexStreet = $_POST["theatreStreet"];
        $complexCity = $_POST["theatreCity"];
        $complexProv = $_POST["theatreProv"];
        $complexCountry = $_POST["theatreCountry"];

        include('connect-db.php');
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{
            $dbh->exec("DELETE FROM theatre WHERE id='$id'");
            echo "Record deleted successfully";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }try{
            $dbh->exec("INSERT INTO theatre (`theatreNum`, `seatCapacity`, `screenSize`, `id`, `complexName`, `addressNum`, `complexStreet`, `complexCity`, `complexProv`, `complexCountry`) VALUES ('$theatreNum', '$seatCapacity', '$screenSize', '$id', '$complexName', '$addressNum', '$complexStreet', '$complexCity', '$complexProv', '$complexCountry')");
            echo "Record updated successfully";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }

        ?>

    </body>
</html>