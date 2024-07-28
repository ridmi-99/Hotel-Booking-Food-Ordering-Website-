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
    <title>Update Delete Rooms</title>
    <link rel="stylesheet" href="./update_delete.css">
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
<div class="container">
        <ul>
        <?php 

$sqlGetrooms = "SELECT `roomid`,`title` FROM `rooms`";


$result = $con->query(($sqlGetrooms));

if($result){

  while($row = $result->fetch_assoc()) {
      
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mobile"]. "<br>";
   $roomid = $row["roomid"];
   $title = $row["title"];

   echo'
   <li>'.$title.'<span class="buttons-up-del"><button class="update"><a href="./updateRoom.php?roomid='.$roomid.'">Update</a></button><button class="delete" ><a href="./delete.php?id='.$roomid.'&tableName=rooms">Delete</a></button><span></li>
   ';

}

}
?>
        </ul>
    </div>

    <?php 
include './footer.php';
?>

</body>
</html>