<?php 
include './connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <link rel="stylesheet" href="rooms.css">
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


<div class="heading-container">
<h3 class="sub-heading">Our Rooms</h3>
  
  </div>
<div class="form-container-filter">
<form  method="post">

<div class="containe-filter">
    <div class="input">

<label for="price"><b>Price</b></label>
<input type="text" placeholder="Price" name="price"  value="">
</div>
<!-- <div class="input">

  <label for="pets"><b>Pets</b></label>
  <input type="text" placeholder="Pets Allowed" name="pets" >
  </div> -->

  <div class="input">
  <label for="pets"><b>Pets</b></label>
  <select name="pets" id="pets">
          <option value="notAllowed">NotAllowed</option>
          <option value="allowed">Allowed</option>
        </select>
  </div>
  <div class="input">
  <label for="minibar"><b>minibar</b></label>
  <select name="minibar" id="minibar">
          <option value="available">Available</option>
          <option value="notavailable">NotAvailable</option>
        </select>
  </div>
  <div class="input">
  <label for="beds"><b>beds</b></label>
  <input type="text" placeholder="beds" name="beds">
  </div>

      
</div>
<div class="button-search">
<button type="submit">filter</button>
</div>


</form>
</div>

<h1 class="heading">All the Rooms</h1>
    <!-- dishes section starts -->
<section class="dishes" id="dishes">

  <div class="box-container">
    <?php 

if($_SERVER['REQUEST_METHOD']=='POST'){

    $checkPrice = $_POST["price"];
    $checkPets = $_POST["pets"];
    $checkMinibar = $_POST["minibar"];
    $checkBeds = $_POST["beds"];


    if(!$checkPrice && !$checkBeds){
        $sqlGetrooms = "SELECT `roomid`, `title`, `image1`, `price` FROM `rooms` WHERE  pets = '$checkPets' AND minibar = '$checkMinibar' ";
    }else if(!$checkPrice){
        $sqlGetrooms = "SELECT `roomid`, `title`, `image1`, `price` FROM `rooms` WHERE  pets = '$checkPets' AND minibar = '$checkMinibar' AND beds <= '$checkBeds'";
    }else if(!$checkBeds){
        $sqlGetrooms = "SELECT `roomid`, `title`, `image1`, `price` FROM `rooms` WHERE  price <= '$checkPrice' AND pets = '$checkPets' AND minibar = '$checkMinibar' ";
    }else{
        $sqlGetrooms = "SELECT `roomid`, `title`, `image1`, `price` FROM `rooms` WHERE price <= '$checkPrice' AND pets = '$checkPets' AND beds <= '$checkBeds' AND minibar = '$checkMinibar' ";
    }
    // echo $checkPrice;

    // $sqlGetrooms = "SELECT `roomid`, `title`, `image1`, `price` FROM `rooms` WHERE price <= '$checkPrice'";
  


$result = $con->query(($sqlGetrooms));

if(!$result){
    echo mysqli_error($con);
}

if(   $result){

  while($row = $result->fetch_assoc()) {
      
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mobile"]. "<br>";
   $roomid = $row["roomid"];
   $title = $row["title"];
   $image1 = $row["image1"];
   $price = $row["price"];
  //  <a href="#" class="fas fa-heart"></a>
  //  <a href="#" class="fas fa-eye"></a>

   echo'
   <div class="box">
   <img src="'.$image1.'" alt="">
   <h3><a href="./roomDetailsPage.php?roomid='.$roomid.'">'.$title.'</a></h3>
   <div class="stars">
     <i class="fas fa-star"></i>
     <i class="fas fa-star"></i>
     <i class="fas fa-star"></i>
     <i class="fas fa-star"></i>
     <i class="fas fa-star-half-alt"></i>
   </div>
   <span>Rs.'.$price.'</span>
   </div>
   ';
  //  <a href="#" class="btn">add to cart..</a>
 
   }


}


}else{

    $sqlGetrooms = "SELECT `roomid`, `title`, `image1`, `price` FROM `rooms`";


$result = $con->query(($sqlGetrooms));

if(   $result){

  while($row = $result->fetch_assoc()) {
      
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mobile"]. "<br>";
   $roomid = $row["roomid"];
   $title = $row["title"];
   $image1 = $row["image1"];
   $price = $row["price"];

  //  <a href="#" class="fas fa-heart"></a>
  //  <a href="#" class="fas fa-eye"></a>
   echo'
   <div class="box">
   <img src="'.$image1.'" alt="">
   <h3><a href="./roomDetailsPage.php?roomid='.$roomid.'">'.$title.'</a></h3>
   <div class="stars">
     <i class="fas fa-star"></i>
     <i class="fas fa-star"></i>
     <i class="fas fa-star"></i>
     <i class="fas fa-star"></i>
     <i class="fas fa-star-half-alt"></i>
   </div>
   <span>Rs.'.$price.'</span>
   </div>
   ';
  //  <a href="#" class="btn">add to cart..</a>
 
   }
}
}
?>

</div>
</section>
<!-- dishes section ends-->

<?php 
include './footer.php';
?>

    
</body>
</html>