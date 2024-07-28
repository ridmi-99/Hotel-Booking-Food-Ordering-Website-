<?php 
include './connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./rooms.css">
    <title>Foods</title>
</head>
<body>
<?php 
    include './navbar.php';
    ?>

<div class="heading-container">
<h3 class="sub-heading">Our Foods</h3>
  
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
  <label for="dinetime"><b>Dinetime</b></label>
  <select name="dinetime" id="dinetime">
          <!-- <option value="notSelected">NotSelected</option> -->
          <option value="breakfast">Breakfast</option>
          <option value="lunch">Lunch</option>
          <option value="dinner">Dinner</option>
        </select>
  </div>

  <div class="input">
  <label for="category"><b>Category</b></label>
  <select name="category" id="category">
          <!-- <option value="notSelected">NotSelected</option> -->
          <option value="spicy">Spicy</option>
          <option value="extraSpicy">Extra Spicy</option>
        </select>
  </div>
  <div class="input">
  <label for="vege"><b>vege</b></label>
  <select name="vege" id="vege">
          <!-- <option value="notSelected">NotSelected</option> -->
          <option value="Meat">Non Vegetarian</option>
          <option value="vegetarian">Vegetarian</option>
        </select>
  </div>
      
</div>
<div class="button-search">
<button type="submit">filter</button>
</div>


</form>
</div>
<h1 class="heading">All the Foods</h1>


<!-- menu sections starts -->

<section class="menu" id="menu">


  <div class="box-container">
    <?php 
    
if($_SERVER['REQUEST_METHOD']=='POST'){

    $checkPrice = $_POST["price"];
    $checkVege = $_POST["vege"];
    $checkDineTime = $_POST["dinetime"];
    $checkCategory = $_POST["category"];


    if(!$checkPrice){
        $sqlGetfoods = "SELECT `foodid`, `name`, `image1`, `price` FROM `foods` WHERE ";
    }else{

        $sqlGetfoods = "SELECT `foodid`, `name`, `image1`, `price` FROM `foods` WHERE price <= '$checkPrice'";
    }




$result = $con->query(($sqlGetfoods));

if(   $result){

  while($row = $result->fetch_assoc()) {
      
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mobile"]. "<br>";
   $foodid = $row["foodid"];
   $name = $row["name"];
   $image1 = $row["image1"];
   $price = $row["price"];
  //  <a href="" class="fas fa-heart"></a>

   echo '
   <div class="box">
   <div class="image">
     <img src="'.$image1.'" alt="" srcset="">
   </div>
   <div class="content">
     <div class="stars">
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star-half-alt"></i>
     </div>
     <h3><a href="./foodDetailsPage.php?foodid='.$foodid.'">'.$name.'</a></h3>
     <p></p>
     <span class="price">Rs.'.$price.'</span>
     </div>
     </div>
     ';
    //  <a href="#" class="btn">add to cart</a>
   }


}


}else{

    $sqlGetfoodsFirst = "SELECT `foodid`, `name`, `image1`, `price` FROM `foods`";


$result = $con->query(($sqlGetfoodsFirst));

if(   $result){

  while($row = $result->fetch_assoc()) {
      
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mobile"]. "<br>";
   $foodid = $row["foodid"];
   $name = $row["name"];
   $image1 = $row["image1"];
   $price = $row["price"];

  //  <a href="" class="fas fa-heart"></a>
   echo '
   <div class="box">
   <div class="image">
     <img src="'.$image1.'" alt="" srcset="">
   </div>
   <div class="content">
     <div class="stars">
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star-half-alt"></i>
     </div>
     <h3><a href="./foodDetailsPage.php?foodid='.$foodid.'">'.$name.'</a></h3>
     <p></p>
     <span class="price">Rs.'.$price.'</span>
     </div>
     </div>
     ';
    //  <a href="#" class="btn">add to cart</a>
 
   }


}


}






?>


?>
</div>
</section>


<!-- menu sections ends -->
<?php 
include './footer.php';
?>

    
</body>
</html>