<?php 
include './connect.php';
session_start();

$userid = $_GET["userid"];
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upd Food & Orders</title>
    <link rel="stylesheet" href="./updateDeleteFood&Orders.css">
    <link rel="stylesheet" href="./all.css">
</head>
<body>
    <?php 
    include './navbar.php';
    ?>
<div class="container-table first">
<h2>Booked Rooms</h2>
<?php 

$sqlGetbookedrooms = "SELECT `bookedid`, `checkindate`,`checkoutdate`,`title`, `price` FROM `booked` WHERE userid = '$userid'";


$result = $con->query(($sqlGetbookedrooms));

echo'
<table>
  <tr>
    <th>Bookedid</th>
    <th>Name</th>
    <th>Checkindate</th>
    <th>CheckOutdate</th>
    <th>price</th>
    <th>delete</th>
  </tr>
';

if(   $result){

  while($row = $result->fetch_assoc()) {
      
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mobile"]. "<br>";
   $bookedid = $row["bookedid"];
   $checkindate = $row["checkindate"];
   $checkoutdate = $row["checkoutdate"];
   $name = $row["title"];
//    $image1 = $row["image1"];
   $price = $row["price"];


   echo '
   <tr>
   <td>'.$bookedid.'</td>
   <td>'.$name.'</td>
   <td>'.$checkindate.'</td>
   <td>'.$checkoutdate.'</td>
   <td>'.$price.'</td>
   <td><button type="button" id="btn"><a href="./delete.php?id='.$bookedid.'&tableName=booked">Cancel</button></td>

 </tr>

   ';
   }
}
?>
   </table>

</div>
<div class="container-table">
<h2>Ordered Meals</h2>

<table>
  <tr>
    <th>OrderId</th>
    <th>Name</th>
    <th>Price</th>
    <th>Delivery Address</th>
    <th>Estimated Time</th>
    <th>Delete</th>
  
  </tr>

<?php 

$sqlorderedfood = "SELECT `orderid`,`name`, `price`, `deliveryAddress`,`estimatedTime`FROM `ordered` WHERE userid = '$userid'";

$result = $con->query(($sqlorderedfood));



if(   $result){

  while($row = $result->fetch_assoc()) {
      
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mobile"]. "<br>";
   $orderid = $row["orderid"];
   $deliveryAddress = $row["deliveryAddress"];
   $price = $row["price"];
   $estimatedTime = $row["estimatedTime"];
   $name = $row["name"];


   echo '  
   <tr>
   <td>'.$orderid.'</td>
   <td>'.$name.'</td>
   <td>'.$price.'</td>
   <td>'.$deliveryAddress.'</td>
   <td>'.$estimatedTime.'</td>
   <td><button type="button" id="btn"><a href="./delete.php?id='.$orderid.'&tableName=ordered">Cancel</button></td>

 </tr>
';
   }
}else{
    echo(mysqli_error($con));
}
?>
</table>
</div>

<?php 
include './footer.php';
?>

    
</body>
</html>
