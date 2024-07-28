<?php 
include './connect.php';
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php 
include './connect.php';
$id = $_GET["id"];
$tableName = $_GET["tableName"];

if($tableName == "rooms"){

    $sqlDelete = "DELETE FROM `$tableName` WHERE roomid ='$id'";
}else if($tableName == "users"){
    $sqlDelete = "DELETE FROM `$tableName` WHERE userid ='$id'";
    
}else if($tableName == "foods"){
    
    $sqlDelete = "DELETE FROM `$tableName` WHERE foodid ='$id'";
}else if($tableName == "ordered"){
    
    $sqlDelete = "DELETE FROM `$tableName` WHERE orderid ='$id'";
}else if($tableName == "booked"){
    
    $sqlDelete = "DELETE FROM `$tableName` WHERE bookedid ='$id'";
}





$result = $con->query(($sqlDelete));


if ($result == TRUE) {
  echo "Record deleted successfully";
  header("location:index.php");
} else {
  echo "Error deleting record: " . $con->error;
}


?>