
<?php 
include './connect.php';
$id = $_GET["foodid"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Details Page</title>
    <link rel="stylesheet" href="./1.css">
    <link rel="stylesheet" href="./all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
      
      $sqlGetAfood = "SELECT * FROM `foods` WHERE `foodid` = '$id'";

      $result = $con->query(($sqlGetAfood));

      if($row = $result->fetch_assoc()){



        echo'
<div id="carouselExampleIndicators" class="carousel slide slide-container" data-ride="carousel">
<ol class="carousel-indicators">
  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
  <div class="carousel-item active">
    <img class="d-block w-100" src="'.$row["image1"].'" alt="First slide">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="'.$row["image2"].'" alt="Second slide">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="'.$row["image3"].'" alt="Third slide">
  </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
';


echo'
<div class="main-detail">
<h1 class="main-title" >'.$row["name"].'</h1>
<div class="main-info">
      <h2>Price <span>:</span> '.$row["price"].'</h2>
      <h2>Category <span>:</span>'.$row["category"].'</h2>
      <h2>Vege/Meat <span>:</span>'.$row["vege"].'</h2>
      <h2>Specifics <span>:</span> '.$row["specifics"].'</h2>
</div>
<div class="main-description">
      <p>
      '.$row["description"].'
      </p>
</div>
<div class="other-extras">
    <h1>Extras</h1>
    <div class="">
    <h2>'.$row["extras1"].'</h2>
    <h2>'.$row["extras2"].'</h2>
    <h2>'.$row["extras3"].'</h2>
    </div>
</div>
</div>

';


echo '
<div class="book-room">
<a href="./orderFood.php?foodid='.$id.'&price='.$row["price"].'&name='.$row["name"].'">
<h2 >Book Now</h2>
</a>
</div>


';

      }
      ?>

<?php 
include './footer.php';
?>


      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

</body>
</html>