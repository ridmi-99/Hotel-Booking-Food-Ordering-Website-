<?php 

include './connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>foot and beverage restuarant</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="./all.css">
   
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- swiper cdn -->

    <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>

    <!-- font awesome cdn link  -->
    <!-- <link rel="stylesheet" href="./all.css"> -->

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
  </head>
  <body>

  <?php 
  include './navbar.php';
  ?>
<div id="carouselExampleIndicators" class="carousel slide slide-container" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./images/images/1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images/images/2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images/images/3.jpg" alt="Third slide">
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

<!-- servies section start -->
<div class="services-container">
      <div class="service">
        <span><i class="fas fa-cocktail"></i></span>
        <h2>Drinks</h2>
        <p>
          Enjoy the best drinks in Sri Lanka
        </p>
      </div>
      <div class="service">
        <span><i class="fas fa-utensils"></i></span>
        <h2>Foods</h2>
        <p>
          Different foods from all over the world
        </p>
      </div>
      <div class="service">
        <span><i class="fas fa-shuttle-van"></i></span>
        <h2>Travel</h2>
        <p>
          Arrange your transportation at ease
        </p>
      </div>
      <div class="service">
        <span><i class="fas fa-beer"></i></span>
        <h2>Beer</h2>
        <p>
          Don't be sober all the time
        </p>
      </div>
    </div>

<!-- servies section end -->


<!-- home section starts -->
<!-- <section class="home" id="home">

  <div class="swiper-container home-slider">

      <div class="swiper-wrapper wrapper">

          <div class="swiper-slide slide">
              <div class="content">
                  <span>our special dish</span>
                  <h3>spicy noodles</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                  <a href="#" class="btn">order now</a>
              </div>
              <div class="image">
                  <img src="images/home-img-1.png" alt="">
              </div>
          </div>

          <div class="swiper-slide slide">
              <div class="content">
                  <span>our special dish</span>
                  <h3>fried chicken</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                  <a href="#" class="btn">order now</a>
              </div>
              <div class="image">
                  <img src="images/home-img-2.png" alt="">
              </div>
          </div>

          <div class="swiper-slide slide">
              <div class="content">
                  <span>our special dish</span>
                  <h3>hot pizza</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                  <a href="#" class="btn">order now</a>
              </div>
              <div class="image">
                  <img src="images/home-img-3.png" alt="">
              </div>
          </div>

      </div>

      <div class="swiper-pagination"></div>
  </div>
</section> -->

<!-- dishes section starts -->
<section class="dishes" id="dishes">
  <h3 class="sub-heading">Our Rooms</h3>
  <h1 class="heading">Popular Choices</h1>
  <div class="box-container">
  <?php 

$sqlGetrooms = "SELECT `roomid`, `title`, `image1`, `price` FROM `rooms`";


$result = $con->query($sqlGetrooms);

if(   $result){

  while($row = $result->fetch_assoc()) {

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
?>
  </div>
</section>
<!-- dishes section ends-->

<!-- about section starts -->
<section class="about" id="about">
  
<h3 class="sub-heading">about us</h3>
<h1 class="heading">why choose us?</h1>

<div class="row">
  <div class="image">
    <img src="./images/about-img.png" alt="">
  </div>
  <div class="content">
    <h3>best food in the country</h3>
    <p>Delicious meals are tasty, appetizing, scrumptious, yummy, luscious, delectable, mouth-watering, fit for a king, delightful, lovely, wonderful, pleasant, enjoyable, appealing, enchanting, charming.</p>
    <p> You wouldn't call delicious that what is tasteless or unpleasant.</p>
    <div class="icons-container">
      <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <span>free delivery</span>
      </div>
      <div class="icons">
        <i class="fas fa-dollar-sign"></i>
        <span>easy payment</span>
      </div>
      <div class="icons">
        <i class="fas fa-headset"></i>
        <span>24/7 service</span>
      </div>
    </div>
    <a href="" class="btn">learn more</a>
  </div>
</div>
</section>
<!-- about section ends -->

<!-- menu sections starts -->

<section class="menu" id="menu">
  <h3 class="sub-heading">Our Foods</h3>
  <h1 class="heading">today's speciality</h1>

  <div class="box-container">


    
  <?php 

$sqlGetfoods = "SELECT `foodid`, `name`, `image1`, `price` FROM `foods`";


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

?>

  </div>
</section>




<!-- menu sections ends -->

<?php 
include './contact.php';
?>


<!-- order section ends -->

<!-- footer section starts -->

<?php 
include './footer.php';
?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!-- swiper js link -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
      <!-- <script src="./script.js"></script> -->


  </body>
</html>
