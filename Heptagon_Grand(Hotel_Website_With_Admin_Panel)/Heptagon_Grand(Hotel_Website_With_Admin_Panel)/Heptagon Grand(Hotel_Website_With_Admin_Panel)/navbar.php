<?php 
session_start();

    $userid =0;

    if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){
        $userid =$_SESSION["userid"];
}

// if($userid){
//     echo $userid;
// }else{
//     echo"There is no user id";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="./all.css">
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
</head>
<body>
          <!-- Header section start -->
    <header>
      <a href="./" class="logo"><i class="fas-fa-untensils">Heptagon Grand</i>
        <nav class="navbar">
        <?php 
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){

          $link = '<a  href="./admin.php?userid='.$userid.'">'.$_SESSION["username"].'</a>';
// if($_SESSION["userrole"] == 'admin'){
//   $link = '<a href="./adming.php?userid='.$userid.'">'.$_SESSION["username"].'</a>';
// }

            $userid =$_SESSION["userid"];
            if($userid){
                // echo $userid;
            }else{
                echo"There is no user id";
            }
            echo'
            <a class="cLink" href="./">Home</a>
            <a class="cLink"href="./rooms.php" >Rooms</a>
            <a class="cLink"href="./foods.php" >Foods</a>
            '.$link.'
            <a class="cLink"href="./logout.php" >Logout</a>
            ';
        }else{
            echo '
            <a class="cLink " href="./">Home</a>
            <a class="cLink"href="./rooms.php" >Rooms</a>
            <a class="cLink"href="./foods.php" >Foods</a>
            <a class="cLink"href="./login.php" >Login</a>';
        }   

        ?>

        </nav>

        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <!-- <i class="fas fa-user" id="search-icon"><a href="./admin.php"></a></i> -->
            <a href="./admin.php" class="fas fa-user"></a>
            <?php 
            echo '
            <a href="./updateDeleteFood&Orders.php?userid='.$userid.'" class="fas fa-shopping-cart"></a>
            
            ';
            ?>
        </div>
      <!-- Header section ends -->

      <!-- search form -->
      <form action="" id="search-form" class="">
          <input type="search" placeholder="search here..."  name="" id="search-box">
          <label for="search-box" class="fas fa-search"></label>
          <i class="fas fa-times" id="close"></i>
      </form>
    </header>
  
    
</body>
</html>