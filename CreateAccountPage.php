<!DOCTYPE html>
<html>
    <head>
        <link href="scss/header.css" type="text/css" rel="stylesheet" >
        <link href="scss/CreateAccountPage.css" type="text/css" rel="stylesheet" >
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" >

    </head>

<div class="topnav">
  <a href="browseTheatres.php">Browse Theatres</a>
    <a href="openingPage.php">Return to Login</a>

</div>
<body>

        <!--Create Account Page-->

        <?php
        session_start();
        $_SESSION["accnum"] = "0";
        ?>
        
        <h1>CREATE NEW ACCOUNT</h1>

        <form class="accountForm" action="/CMPE332-Project/CreateAccountPHP.php" method="post">
            
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" class="form-control" name="inputEmail" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" name="inputPassword" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="fName" placeholder="First Name">
            </div>

            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lName" placeholder="Last Name">
            </div>

            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" class="form-control" name="addressNum" placeholder="Street Number">
                <input type="text" class="form-control" name="street" placeholder="Street">
                <input type="text" class="form-control" name="city" placeholder="City">
                <input type="text" class="form-control" name="prov" placeholder="Province">
                <input type="text" class="form-control" name="country" placeholder="Country">
                <input type="text" class="form-control" name="PC" placeholder="Postal Code">
            </div>

            <div class="form-group">
                <label for="phoneNum">Phone Number</label>
                <input type="number" class="form-control" name="phoneNum" placeholder="Phone Number">
            </div>

            <div class="form-group">
                <label for="CCNumber">Credit Card Number</label>
                <input type="number" class="form-control" name="CCNumber" placeholder="Credit Card #">
            </div>

            <div class="form-group">
                <label for="CCDate">Credit Card Date</label>
                <input type="date" class="form-control" name="CCDate" placeholder="Credit Card Date">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>

            <button type="button" class="btn btn-default"> 
                <a href = "openingpage.php">Back</a>
            </button>

        </form>

    </body>
</html>