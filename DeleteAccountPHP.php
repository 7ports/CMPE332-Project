<!--Delete Account PHP-->

<!DOCTYPE html>
<html>
    <body>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >
        
        <h1>PHP Page</h1>
        <a href = "AdminPage.php">Back to Admin Portal </a>

        <?php
        session_start();
        $DeleteInput = $_POST["DeleteInput"];
        
        echo $DeleteInput;
        //echo accountNum;
        
        $dbh = new PDO('mysql:host=localhost;dbname=movietheatres', "root", "");
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try{
             $dbh->exec("DELETE FROM Customer WHERE AccountNum='$DeleteInput'");
            echo "Record deleted successfully";
        }
        catch(PDOexception $e){
            print "Error:" . $e->getMessage() . "<br/>";
            die();
        }

        ?>

    </body>
</html>