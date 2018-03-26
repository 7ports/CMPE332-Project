<!DOCTYPE html>
<html>
    <body>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >

        
        

        <?php
        session_start();

        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $addressNum = $_POST["addressNum"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $prov = $_POST["prov"];
        $country = $_POST["country"];
        $PC = $_POST["PC"];
        $phoneNum = $_POST["phoneNum"];
        $inputEmail = $_POST["inputEmail"];
        $accountNum = $_SESSION["accnum"];
        $inputPassword = $_POST["inputPassword"];
        $CCNumber = $_POST["CCNumber"];
        $CCDate = $_POST["CCDate"];

        echo $accountNum;

        #$dbh = new PDO('mysql:host=localhost;dbname=movietheatres', "root", "");
        include('connect-db.php');

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		
        try{
            $dbh->exec("UPDATE `Customer` SET `Fname` = '$fName', `Lname` = '$lName', `addressNum` = '$addressNum', `street` = '$street', `city` = '$city', `Prov` = '$prov', `Country` = '$country', `PC` = '$PC', `phoneNumber` = '$phoneNum', `Email` = '$inputEmail', `Password` = '$inputPassword', `creditCardNum` = '$CCNumber', `creditCardExpiryDate` = '$CCDate' WHERE AccountNum = '$accountNum'");

            print "Success";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }

		header("Location:profilepage.php");
		exit;

        ?>

    </body>
</html>