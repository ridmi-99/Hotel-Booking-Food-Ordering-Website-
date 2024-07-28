<?php 
include "./connect.php";

session_start();
$userid = $_SESSION["userid"];
$roomid = $_GET["roomid"];
$price = $_GET["price"];
$beds = $_GET["beds"];
$title = $_GET["title"];
// $children = $_GET["children"];

?>
<?php 
include './connect.php';
session_start();
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
    <title>Book Room</title>
    <link rel="stylesheet" href="createRoom.css">
    <link rel="stylesheet" href="./all.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
</head>
<body>
    <?php 
    include './navbar.php';
    ?>

<div class="form-container">
<form  method="post">

<div class="container">


<?php 

// if($_POST["username"] && $_POST["password"] && $_POST["email"] && $_POST["passwordConfirm"] ){
if($_SERVER['REQUEST_METHOD']=='POST'){
  $newroomid = $_POST["roomid"];
  $newuserid= $_POST["userid"];
  $newprice = $_POST["price"];
  $newchildren = $_POST["children"];
  $checkindate = $_POST["checkindate"];
  $checkoutdate = $_POST["checkoutdate"];
  $newbeds = $_POST["beds"];
  $newfood = $_POST["foods"];
  $newtitle = $_POST["title"];


  $sqlbookroom = "INSERT INTO `booked`( `checkindate`, `checkoutdate`, `roomid`, `userid`, `children`, `food`, `price`,`title`) VALUES ('$checkindate','$checkoutdate','$newroomid','$newuserid','$newchildren','$newfood','$newprice','$newtitle')";

  if(mysqli_query($con,$sqlbookroom)){
      echo"Data inserted successfully...";
      header("location:index.php");
  }else{
      die(mysqli_error($con));
  }

}
echo '
<label for="userid">userid</label>
<input type="text" placeholder="userid" name="userid" value="'.$userid.'">


<label for="roomid">roomid</label>
<input type="text" placeholder="roomid" name="roomid" value="'.$roomid.'">


<label for="price">price</label>
<input type="text" placeholder="price" name="price" value="'.$price.'">
<label for="title">Name</label>
<input type="text" placeholder="title" name="title" value="'.$title.'">


<label for="beds">beds</label>
<input type="text" placeholder="beds" name="beds" value="'.$beds.'">


<label for="children">children</label>
<input type="text" placeholder="children" name="children" value="">


<label for="foods">foods</label>
<input type="text" placeholder="foods" name="foods" value="">


<label for="checkindate">checkindate</label>
<input type="date" placeholder="checkindate" name="checkindate" value="">


<label for="checkoutdate">checkoutdate</label>
<input type="date" placeholder="checkoutdate" name="checkoutdate" value="">



';

?>




  


    
<button type="submit">Book Room</button>
</div>


</form>
</div>

<?php 
include './footer.php';
?>

</body>
</html>
