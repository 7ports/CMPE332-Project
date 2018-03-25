 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View cart-d2dn</title>
</head>

<body>
<h1>View Cart</h1>

<table border='1'>
         <tr>
         <th> VIN </th>
         <th> Vehicle Description </th>
         <th> Price </th>
         </tr>
<?php
session_start();
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT vin,description,price FROM products where user_id='".$_SESSION['use_i']."' ";
$result = mysqli_query($conn, $sql);

$uq=mysql_query("select * from td_user where user_id='".$_SESSION['use_i']."' ");
$u_row=mysql_fetch_array($uq);
if(isset($_REQUEST['delete']))
{
$sql_s =" DELETE FROM `products` WHERE user_id='".$u_row['user_id']."' AND vin='".$_REQUEST['vin']."' " ;
$result_s = mysqli_query($conn,$sql_s) ;
if($result_s == true)
{
echo '<script language="javascript">';
echo 'alert("Deleted successfully")';
echo '</script>';
}
else
{
echo '<script language="javascript">';
echo 'alert("Error in deletion")';
echo '</script>';
}
}
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

    echo '<tr>
            <td>'.$row['vin'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['price'].' </td>
            <td>  <form method="post"> <input type="submit" name="delete" value="Delete">
 <input type="hidden" name="vin" value="'.$row['vin'].'">
 </form></td>
        </tr>';

    }   
}
else
{
echo "Your cart is empty!";
}
?>        
<?php
echo '</table>';
?>
<form><input type="button" value="Go back" onClick="window.location.href='automobile_list.php'">
<input type="button" value="Submit" onClick="window.location.href='mail.php'">
</form>

<?php

mysqli_close($conn);
?>

<?php

include('footer.php');
?>
</body>
</html>