<!DOCTYPE html>
<html>
    <body>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >

        <h1>PHP Page</h1>
        <a href = "CreateAccountPage.php">Back to Create Account </a>

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
        $accountNum = rand(10000,99999);
        $inputPassword = $_POST["inputPassword"];
        $CCNumber = $_POST["CCNumber"];
        $CCDate = $_POST["CCDate"];

        echo $accountNum;

        $dbh = new PDO('mysql:host=localhost;dbname=movietheatres', "root", "");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $dbh->exec("INSERT INTO `Customer` (`Fname`, `Lname`, `addressNum`, `street`, `city`, `Prov`, `Country`, `PC`, `phoneNumber`, `Email`, `AccountNum`, `Password`, `creditCardNum`, `creditCardExpiryDate`) VALUES ('$fName', '$lName', '$addressNum', '$street', '$city', '$prov', '$$country', '$PC', '$phoneNum', '$inputEmail', $accountNum, '$inputPassword', '$CCNumber', '$CCDate')");

            print "Success";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }



        ?>

    </body>
</html>