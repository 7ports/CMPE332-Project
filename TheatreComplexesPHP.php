<!--Create and Edit Movie Theatre Complexes-->

<!DOCTYPE html>
<html>
    <body>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >

        <h1>PHP Page</h1>
        <a href = "AdminPage.php">Back to Admin Portal </a>

        <?php
        session_start();
        $numTheatre = $_POST["numTheatre"];
        $complexName = $_POST["complexName"];
        $complexAddressNum = $_POST["complexAddressNum"];
        $complexStreet = $_POST["complexStreet"];
        $complexCity = $_POST["complexCity"];
        $complexProv = $_POST["complexProv"];
        $complexCountry = $_POST["complexCountry"];
        $complexPC = $_POST["complexPC"];

        include('connect-db.php');
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try{
            $dbh->exec("DELETE FROM theatreComplex WHERE name='$complexName'");
            echo "Record deleted successfully";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }try{
            $dbh->exec("INSERT INTO theatreComplex (`numTheatre`,`name`,`addressNum`, `street`, `city`, `prov`, `country`, `PC`) VALUES ('$numTheatre','$complexName','$complexAddressNum', '$complexStreet', '$complexCity', '$complexProv', '$complexCountry', '$complexPC')");
            echo "Record updated successfully";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }

        ?>

    </body>
</html>