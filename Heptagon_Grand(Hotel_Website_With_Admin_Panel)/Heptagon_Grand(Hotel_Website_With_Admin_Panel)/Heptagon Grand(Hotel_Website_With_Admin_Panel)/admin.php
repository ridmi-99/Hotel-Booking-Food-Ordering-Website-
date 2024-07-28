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
    <title>Admin</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="./all.css">
</head>
<body>

<?php 
include './navbar.php';

?>
    <div class="container">
     
            <?php 

            if($_SESSION["role"]== "admin"){
                echo '

                <h1>Admin Panel</h1>
                <ul>
                <li><a href="./profile.php?userid='.$userid.'">Update User Profile</a></li>
                <li><a href="./createRoom.php">Create Room</a></li>
                <li><a href="./update_delete.php">Update/Delete Room</a></li>
                <li><a href="./createFood.php">Create Food</a></li>
                <li><a href="./updateDeleteFood.php">Update/Delete Food</a></li>
                <li><a href="./updateDeleteFood&Orders.php?userid='.$userid.'">Ordered Foods And Booked Rooms</a></li>';

            }else{
                echo '

                <h1>User Panel</h1>
                <ul>
                <li><a href="./profile.php?userid='.$userid.'">Update User Profile</a></li>
                <li><a href="./updateDeleteFood&Orders.php?userid='.$userid.'">Ordered Foods And Booked Rooms</a></li>
                ';

            }

            

            ?>
   

        </ul>
    </div>

    <?php 
include './footer.php';
?>

</body>
</html>