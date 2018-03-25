<!--Admin Page-->

<!DOCTYPE html>
<html>

    <?php
    session_start();
    /*
    $email = $_POST["email"];
    $password = $_POST["pwrd"];
*/


    $dbh = new PDO('mysql:host=localhost;dbname=movietheatres',"root","");



    /*    if($results->rowCount() == 0){
        $_SESSION["failed"] = "yes";
        header("Location:admingpage.php");
        exit;
    }*/

    /*    if ($rows->fetchColumn(10) != $password){
        $_SESSION["failed"] = "yes";
        header("Location:adminpage.php");
        exit;
    } */

    $_SESSION["failed"] = "no";

    ?>

    <head>
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

    <title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>

        <div class="w3-sidebar w3-bar-block w3-black w3-card" style="width:130px">
            <h5 class="w3-bar-item">Menu</h5>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Members')">Members</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Movies')">Movies</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Theatres')">Movie Theatres</button>
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Complexes')">Movie Complexes</button>
        </div>

        <div style="margin-left:130px">

            <div id="Members" class="w3-container city w3-animate-opacity" style="display:none">
                <h2>Manage Members</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Account Number</th>
                            <th>Delete Account</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try{
                            $rows = $dbh->query("SELECT Fname, Lname, accountNum FROM customer");
                        } catch(PDOexception $e){
                            print "Error!: " . $e->getMessage()."<br/>";
                            die();
                        }

                        foreach($rows as $row){
                            echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."</td>";
                            /*echo "<td><input type="button" value="Delete" onClick="window.location.href='mail.php'"></td>";
                            echo "</tr>";*/


                        }
                        $dbh = null;
                        ?>
                    </tbody>

                </table>

            </div>

            <div id="Movies" class="w3-container city w3-animate-left" style="display:none">
                <h2>Manage Movies</h2>
                <p>Paris is the capital of France.</p> 
                <p>The Paris area is one of the largest population centers in Europe, with more than 12 million inhabitants.</p>
            </div>

            <div id="Theatres" class="w3-container city w3-animate-top" style="display:none">
                <h2>Manage Movie Theatres</h2>
                <p>Tokyo is the capital of Japan.</p>
                <p>It is the center of the Greater Tokyo Area, and the most populous metropolitan area in the world.</p>
            </div>

            <div id="Complexes" class="w3-container city w3-animate-right" style="display:none">
                <h2>Manage Movie Complexes</h2>
                <p>London is the capital city of England.</p>
                <p>It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
            </div>
        </div>

        <script>
            function openLink(evt, animName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("city");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
                }
                document.getElementById(animName).style.display = "block";
                evt.currentTarget.className += " w3-red";
            }
        </script>

    </body>
</html>
