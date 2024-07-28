
<?php 
include "./connect.php";


$foodid = $_GET["foodid"];
$price = $_GET["price"];
$name = $_GET["name"];
// $beds = $_GET["beds"];
// $children = $_GET["children"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food</title>
    <link rel="stylesheet" href="createRoom.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
</head>
<body>
   



<?php 
include './navbar.php';
?>
<?php 
include './connect.php';
// session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>



<div class="form-container">
<form  method="post">

<div class="container">

<?php 

$userid = $_SESSION["userid"];
  // if($_POST["username"] && $_POST["password"] && $_POST["email"] && $_POST["passwordConfirm"] ){
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $newfoodid = $_POST["foodid"];
    $newuserid= $_POST["userid"];
    $newprice = $_POST["price"];
    $newquantity = $_POST["quantity"];
    $newdeliveryAddress = $_POST["deliveryAddress"];
    $newestimatedTime = $_POST["estimatedTime"];
    $newname = $_POST["name1"];


    $sqlorderfood = "INSERT INTO `ordered`( `quantity`, `price`, `userid`, `foodid`, `deliveryAddress`, `estimatedTime`,`name`) VALUES ('$newquantity','$newprice','$newuserid','$foodid','$newdeliveryAddress','$newestimatedTime','$newname')";
  
    if(mysqli_query($con,$sqlorderfood)){
        echo"Data inserted successfully...";
        // header("location:index.php");
    }else{
        die(mysqli_error($con));
    }
  
  }

  echo '
  <label for="userid">userid</label>
  <input type="text" placeholder="userid" name="userid" value="'.$userid.'">


  <label for="foodid">foodid</label>
  <input type="text" placeholder="foodid" name="foodid" value="'.$foodid.'">


  <label for="price">price</label>
  <input type="text" placeholder="price" name="price" value="'.$price.'">

  <label for="name">name</label>
  <input type="text" placeholder="name" name="name1" value="'.$name.'">



  <label for="quantity">quantity</label>
  <input type="text" placeholder="quantity" name="quantity" value="">


  <label for="deliveryAddress">deliveryAddress</label>
  <input type="text" placeholder="deliveryAddress" name="deliveryAddress" value="">


  <label for="estimatedTime">estimatedTime</label>
  <input type="text" placeholder="estimatedTime" name="estimatedTime" value="">


  ';

  
  ?>





<button type="submit">Order Meal</button>

</div>


</form>
</div>

<?php 
include './footer.php';
?>

    
</body>
</html>