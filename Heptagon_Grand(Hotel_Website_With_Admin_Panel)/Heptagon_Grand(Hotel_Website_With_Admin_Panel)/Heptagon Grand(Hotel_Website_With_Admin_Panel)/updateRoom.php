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
// include './connect.php';
$id = $_GET["roomid"];


$sqlGetRoom = "SELECT * FROM rooms WHERE roomid ='$id'";
// $sqlGetUser = "SELECT * FROM users WHERE email = $email";

$result = $con->query($sqlGetRoom);

if($row = $result->fetch_assoc()){

    $toUptitle = $row["title"];
    $toUpbeds = $row["beds"];
    $toUpAC = $row["AC"];
    $toUpnonAC = $row["nonAC"];
    $toUpimage1 = $row["image1"];
    $toUpimage2 = $row["image2"];
    $toUpimage3 = $row["image3"];
    $toUpdescription = $row["description"];
    $toUpprice = $row["price"];
    $toUppets = $row["pets"];
    $toUpminibar = $row["minibar"];
    $toUpwifi = $row["wifi"];
    $toUpextras1 = $row["extras1"];
    $toUpextras2 = $row["extras2"];
    $toUpextras3 = $row["extras3"];
    $toUpextras4 = $row["extras4"];
    $toUpextras5 = $row["extras5"];
    $toUpextras6 = $row["extras6"];
    $toUpavailable = $row["available"];
    
    

}

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
    <title>Update Room</title>
    <link rel="stylesheet" href="createRoom.css">
    <link rel="stylesheet" href="./all.css">
</head>
<body>
    <?php 
    include './navbar.php';
    ?>
<div class="form-container">
    <h1>Update A Room</h1>
<form  method="post" enctype="multipart/form-data">

<div class="container">

<?php 

echo '
<label for="title">title</label>
<input type="text" class="form-control" id="floatingInput" width="72" placeholder="title" name="title" value="'.$toUptitle.'">

<label for="beds">beds</label>
<input type="text"  placeholder="beds" name="beds" value="'.$toUpbeds.'">

<label for="A/C">AC</label>
<input type="text"  placeholder="A/C" name="A/C" value="'.$toUpAC.'">

<label for="nonA/C">nonAC</label>
<input type="text"  placeholder="nonA/C" name="nonA/C" value="'.$toUpnonAC.'">

<label for="image1">image1</label>
<input type="file"  placeholder="image1" name="image1" value="'.$toUpimage1.'">

<label for="image2">image2</label>
<input type="file"  placeholder="image2" name="image2" value="'.$toUpimage2.'">

<label for="image3">image3</label>
<input type="file"  placeholder="image3" name="image3" value="'.$toUpimage3.'">

<label for="description">description</label>
<input type="text"  placeholder="description" name="description" value="'.$toUpdescription.'">

<label for="price">price</label>
<input type="text"  placeholder="price" name="price" value="'.$toUpprice.'">

<label for="pets">pets</label>
<input type="text"  placeholder="pets" name="pets" value="'.$toUppets.'">

<label for="minibar">minibar</label>
<input type="text"  placeholder="minibar" name="minibar" value="'.$toUpminibar.'">

<label for="wifi">wifi</label>
<input type="text"  placeholder="wifi" name="wifi" value="'.$toUpwifi.'">

<label for="extras1">extras1</label>
<input type="text"  placeholder="extras1" name="extras1" value="'.$toUpextras1.'">

<label for="extras2">extras2</label>
<input type="text"  placeholder="extras2" name="extras2" value="'.$toUpextras2.'">

<label for="extras3">extras3</label>
<input type="text"  placeholder="extras3" name="extras3" value="'.$toUpextras3.'">

<label for="extras4">extras4</label>
<input type="text"  placeholder="extras4" name="extras4" value="'.$toUpextras4.'">

<label for="extras5">extras5</label>
<input type="text"  placeholder="extras5" name="extras5" value="'.$toUpextras5.'">

<label for="extras6">extras6</label>
<input type="text"  placeholder="extras6" name="extras6" value="'.$toUpextras6.'">

<label for="available">available</label>
<input type="text"  placeholder="available" name="available" value="'.$toUpavailable.'">
';

?>
    



  <button type="submit">Update Room</button>

</div>
</form>
</div>
<?php 
    
    if($_SERVER['REQUEST_METHOD']== 'POST'){

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
    


        $title = $_POST["title"];
        echo $title;
        $beds = $_POST["beds"];
        $AC = $_POST["A/C"];
        $nonAC = $_POST["nonA/C"];
        $image1 = "./uploads/rooms/$img1Name";
        $image2 = "./uploads/rooms/$img2Name";
        $image3 = "./uploads/rooms/$img3Name";
        // $image1 = $_POST["image1"];
        // $image2 = $_POST["image2"];
        // $image3 = $_POST["image3"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $pets = $_POST["pets"];
        $minibar = $_POST["minibar"];
        $wifi = $_POST["wifi"];
        $extras1 = $_POST["extras1"];
        $extras2 = $_POST["extras2"];
        $extras3 = $_POST["extras3"];
        $extras4 = $_POST["extras4"];
        $extras5 = $_POST["extras5"];
        $extras6 = $_POST["extras6"];
        $available = $_POST["available"];


        $sqlUpdateRoom = "UPDATE `rooms` SET `title`='$title',`beds`='$beds',`AC`='$AC',`nonAC`='$nonAC',`image1`='$image1',`image2`='$image2',`image3`='$image3',`description`='$description',`price`='$price',`pets`='$pets',`minibar`='$minibar',`wifi`='$wifi',`extras1`='$extras1',`extras2`='$extras2',`extras3`='$extras3',`extras4`='$extras4',`extras5`='$extras5',`extras6`='$extras6',`available`='$available' WHERE roomid='$id'";
      
        if(mysqli_query($con,$sqlUpdateRoom)){
            echo"Data updated successfully...";

            
      $newLocation = "./uploads/rooms/$img1Name";
$imgUpload = move_uploaded_file($img1TempName,$newLocation);

if($imgUpload == 0){
  echo "There was an error uploading the file";
  
}
$newLocation = "./uploads/rooms/$img2Name";
$imgUpload = move_uploaded_file($img2TempName,$newLocation);

if($imgUpload == 0){
  echo "There was an error uploading the file";
  
}
$newLocation = "./uploads/rooms/$img3Name";
$imgUpload = move_uploaded_file($img3TempName,$newLocation);

if($imgUpload == 0){
  echo "There was an error uploading the file";
  
}

            header("location:admin.php");
        }else{
            die(mysqli_error($con));
        }
      
      }
    }
    ?>

<?php 
include './footer.php';
?>


</body>
</html>