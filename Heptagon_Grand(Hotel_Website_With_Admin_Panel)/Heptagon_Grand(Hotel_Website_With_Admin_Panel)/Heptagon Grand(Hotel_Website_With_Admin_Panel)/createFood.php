<?php 
include "./connect.php";
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
    <title>Create Food</title>
    <link rel="stylesheet" href="./createFood.css">
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

<?php 

// if($_POST["username"] && $_POST["password"] && $_POST["email"] && $_POST["passwordConfirm"] ){
if($_SERVER['REQUEST_METHOD']=='POST'){

    $img1Name = $_FILES["image1"]["name"];
    $img1Type = $_FILES["image1"]["type"];
    $img1Size = $_FILES["image1"]["size"];
  
    $img1TempName = $_FILES["image1"]["tmp_name"];
    
    $img2Name = $_FILES["image2"]["name"];
    $img2Type = $_FILES["image2"]["type"];
    $img2Size = $_FILES["image2"]["size"];
    
    $img2TempName = $_FILES["image2"]["tmp_name"];
    
    $img3Name = $_FILES["image3"]["name"];
    $img3Type = $_FILES["image3"]["type"];
    $img3Size = $_FILES["image3"]["size"];
    
    $img3TempName = $_FILES["image3"]["tmp_name"];


  $name = $_POST["name"];
  echo $name;
  $category = $_POST["category"];
  $image1 = "./uploads/foods/$img1Name";
  $image2 = "./uploads/foods/$img2Name";
  $image3 = "./uploads/foods/$img3Name";

//   $image1 = $_POST["image1"];
//   $image2 = $_POST["image2"];
//   $image3 = $_POST["image3"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $dinetime = $_POST["dinetime"];
  $vege = $_POST["vege"];
  $specifics = $_POST["specifics"];
  $extras1 = $_POST["extras1"];
  $extras2 = $_POST["extras2"];
  $extras3 = $_POST["extras3"];
  $sqlCreateFood = "INSERT INTO foods (name,category,dinetime,vege,specifics,description,image1,image2,image3,extras1,extras2,extras3,price) VALUES ('$name','$category','$dinetime','$vege','$specifics','$description','$image1','$image2','$image3','$extras1','$extras2','$extras3','$price')";

  if(mysqli_query($con,$sqlCreateFood)){
      echo"Data inserted successfully...";

      $newLocation = "./uploads/foods/$img1Name";
$imgUpload = move_uploaded_file($img1TempName,$newLocation);

if($imgUpload == 0){
  echo "There was an error uploading the file";
  
}
$newLocation = "./uploads/foods/$img2Name";
$imgUpload = move_uploaded_file($img2TempName,$newLocation);

if($imgUpload == 0){
  echo "There was an error uploading the file";
  
}
$newLocation = "./uploads/foods/$img3Name";
$imgUpload = move_uploaded_file($img3TempName,$newLocation);

if($imgUpload == 0){
  echo "There was an error uploading the file";
  
}
      header("location:index.php");
  }else{
      echo mysqli_error($con);
      die(mysqli_error($con));
  }

}



?>

    
<div class="form-container">
    <h1>Create A Meal</h1>
<form  method="post" enctype="multipart/form-data">

<div class="container">

    <label for="name">name</label>
      <input type="text" placeholder="name" name="name" value="">
    
      <label for="category">category</label>
      <input type="text" placeholder="category" name="category" value="">
    
      <label for="image1">image1</label>
      <input type="file" name="image1" placeholder="image1" value="">
      <!-- <input type="text"  placeholder="image1" name="image1" value=""> -->
    
    
      <label for="image2">image2</label>
      <input type="file" name="image2" placeholder="image2" value="">
      <!-- <input type="text"  placeholder="image2" name="image2" value=""> -->
    
    
      <label for="image3">image3</label>
      <input type="file" name="image3" placeholder="image3" value="">
      <!-- <input type="text"  placeholder="image3" name="image3" value=""> -->
      <!-- <label for="image1">image1</label>
      <input type="text" placeholder="image1" name="image1" value="">
    
      <label for="image2">image2</label>
      <input type="text" placeholder="image2" name="image2" value="">
    
      <label for="image3">image3</label>
      <input type="text" placeholder="image3" name="image3" value=""> -->
    
      <label for="description">description</label>
      <input type="text" placeholder="description" name="description" value="">
    
      <label for="price">price</label>
      <input type="text" placeholder="price" name="price" value="">
    
      <label for="dinetime">dinetime</label>
      <input type="text" placeholder="dinetime" name="dinetime" value="">
    
      <label for="vege">vege</label>
      <input type="text" placeholder="vege" name="vege" value="">
    
      <label for="specifics">specifics</label>
      <input type="text" placeholder="specifics" name="specifics" value="">

    
      <label for="extras1">extras1</label>
      <input type="text" placeholder="extras1" name="extras1" value="">
    
      <label for="extras2">extras2</label>
      <input type="text" placeholder="extras2" name="extras2" value="">
    
      <label for="extras3">extras3</label>
      <input type="text" placeholder="extras3" name="extras3" value="">

      <button type="submit">Create Food</button>
</div>


</form>
</div>

<?php 
include './footer.php';
?>

</body>
</html>