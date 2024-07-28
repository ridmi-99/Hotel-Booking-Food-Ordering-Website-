<?php 
include './connect.php';

// Initialize the session


 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="login.css"> -->
    <link rel="stylesheet" href="./loginmy.css">
</head>
<body>
  <?php 
  include './navbar.php';
  ?>
<div class="login-container">
  <h1>Login</h1>
<form  method="post">

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
  </div>

  <div class="container container-2" style="background-color:#f1f1f1">
    <!-- <button type="button" class="cancelbtn">Cancel</button> -->
    <span class="password">Forgot <a href="#">password?</a></span>
    <span class="password">Don't have an account? <a href="./signup.php">Signup?</a></span>
  </div>
</form>
<?php 
    
    if($_SERVER['REQUEST_METHOD']== 'POST'){
      $email = $_POST["email"];
      $password = $_POST["password"];


      $sqlGetUser = "SELECT * FROM users WHERE email = '$email'";
      // $sqlGetUser = "SELECT * FROM users WHERE email = $email";

      $result = $con->query(($sqlGetUser));
      // if($result){
      //   echo"results are here";
      // }else{
      //   echo"results are not here";
      // }
    
      
      // if($result->num_rows > 0){
      if(  $row = $result->fetch_assoc()){

        if($row["password"] !=  $password){
          echo"Passwords dosnet match";
          return;
        }

        

        echo $row["username"];
        echo"its working";
        session_start();

        $_SESSION["loggedin"] = true;
        $_SESSION["userid"] = $row["userid"];
        $_SESSION["username"] = $row["username"];  
        $_SESSION["role"] = $row["role"];
      //   $_SESSION[""] = $row["username"];  

        header('location:index.php');
      }else{
        echo"its not working";
      }

      
    }else{


    }
    ?>

</div>

<?php 
include './footer.php';
?>


</body>
</html>