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
$id = $_GET["userid"];
;

session_start();
$sqlGetUser = "SELECT * FROM users WHERE userid ='$id'";
// $sqlGetUser = "SELECT * FROM users WHERE email = $email";

$result = $con->query(($sqlGetUser));

if($row = $result->fetch_assoc()){

    $toUpUsername  = $row["username"];
    
    

}

// Initialize the session


 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
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
    <title>Update Profile</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="./profile.css">
</head>
<body>
    <?php 
    include './navbar.php';
    ?>

<div class="form-container">
  <!-- <div class="profile-update-heading"> -->
  <h1>Update Profile Info</h1>
  <!-- </div> -->
      
<form  method="post">

<div class="container">
<?php 
echo'
<label for="username"><b>Username</b></label>
<input type="text" placeholder="Enter Username" name="username" required value="'.$toUpUsername.'">
';
?>


  <label for="passwordCurrent"><b>Password Current</b></label>
  <input type="password" placeholder="Enter Current Password" name="passwordCurrent" >

  <label for="password"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="password">
  <label for="passwordConfirm"><b>Password Confirm</b></label>
  <input type="password" placeholder="Password Confirm" name="passwordConfirm">
      
  <button type="submit">Update Profile</button>
</div>


</form>
</div>
<?php 
    
    if($_SERVER['REQUEST_METHOD']== 'POST'){
      $username = $_POST["username"];
      $passwordCurrent = $_POST["passwordCurrent"];
      $password = $_POST["password"];
      $passwordConfirm = $_POST["passwordConfirm"];


      $sqlGetUser = "SELECT * FROM users WHERE userid ='$id'";
      // $sqlGetUser = "SELECT * FROM users WHERE email = $email";

      $result = $con->query(($sqlGetUser));

      
      // if($result){
      //   echo"results are here";
      // }else{
      //   echo"results are not here";
      // }
    
      
      // if($result->num_rows > 0){
      if(  $row = $result->fetch_assoc()){
       
          if(!$password){
              $updateUserSql = "UPDATE `users` SET `username`='$username' WHERE userid='$id'";
          }else{

              $updateUserSql = "UPDATE `users` SET `username`='$username',`password`='$password' WHERE userid='$id'";
              if( $row["password"] != $passwordCurrent ){

                echo $row["password"];
                echo $passwordCurrent;
              echo"Passwords dosent match try again...";
              return;
          }
          
            }

         
          
        //   $updateUserSql = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
        if(mysqli_query($con,$updateUserSql)){
            echo"Data inserted successfully...";
            // header("location:profile.php");
        }else{
            die(mysqli_error($con));
        }
        echo $row["username"];
        echo"its working";
 
   
        $_SESSION["username"] = $row["username"];  
      //   $_SESSION[""] = $row["username"];  

        // header('location:index.php');
      }else{
        echo"its not working";
      }

      
    }
    ?>

<?php 
include './footer.php';
?>


    
</body>
</html>