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
$id = $_GET["foodid"];


$sqlGetfood = "SELECT * FROM foods WHERE foodid ='$id'";
// $sqlGetUser = "SELECT * FROM users WHERE email = $email";

$result = $con->query($sqlGetfood);

if($row = $result->fetch_assoc()){

    $toUpname = $row["name"];
    $toUpcategory = $row["category"];
    $toUpimage1 = $row["image1"];
    $toUpimage2 = $row["image2"];
    $toUpimage3 = $row["image3"];
    $toUpdescription = $row["description"];
    $toUpprice = $row["price"];
    $toUpdinetime = $row["dinetime"];
    $toUpvege = $row["vege"];
    $toUpextras1 = $row["extras1"];
    $toUpextras2 = $row["extras2"];
    $toUpextras3 = $row["extras3"];
    $toUpspecifics = $row["specifics"];
 
    
    

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Food</title>
    <link rel="stylesheet" href="createRoom.css">
    <link rel="stylesheet" href="./all.css">
</head>
<body>
<?php 
    include './navbar.php';
    ?>

<!-- <div class="form-container">
<form  method="post">

<div class="container"> -->

<div class="form-container">
    <h1>Update A Food</h1>
<form method="POST" enctype="multipart/form-data">
<div class="container">

<?php 
echo '

<label for="name">name</label>
<input type="text"  placeholder="title" name="name" value="'.$toUpname.'">




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


<label for="category">category</label>
<input type="text"  placeholder="category" name="category" value="'.$toUpcategory.'">


<label for="dinetime">dinetime</label>
<input type="text"  placeholder="dinetime" name="dinetime" value="'.$toUpdinetime.'">


<label for="vege">vege</label>
<input type="text"  placeholder="dinetime" name="vege" value="'.$toUpvege.'">


<label for="extras1">extras1</label>
<input type="text"  placeholder="extras1" name="extras1" value="'.$toUpextras1.'">


<label for="extras2">extras2</label>
<input type="text"  placeholder="extras2" name="extras2" value="'.$toUpextras2.'">


<label for="extras3">extras3</label>
<input type="text"  placeholder="extras3" name="extras3" value="'.$toUpextras3.'">


<label for="specifics">specifics</label>
<input type="text"  placeholder="specifics" name="specifics" value="'.$toUpspecifics.'">

';

?>




<button type="submit">Update Food</button>
</div>
</form>
</div>

<?php 
    
    // if($_SERVER['REQUEST_METHOD']== 'POST'){

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
        // $beds = $_POST["beds"];
        // $AC = $_POST["A/C"];
        // $nonAC = $_POST["nonA/C"];

        $image1 = "./uploads/foods/$img1Name";
        $image2 = "./uploads/foods/$img2Name";
        $image3 = "./uploads/foods/$img3Name";
        // $image1 = $_POST["image1"];
        // $image2 = $_POST["image2"];
        // $image3 = $_POST["image3"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $category = $_POST["category"];
        $dinetime = $_POST["dinetime"];
        $vege = $_POST["vege"];
        $extras1 = $_POST["extras1"];
        $extras2 = $_POST["extras2"];
        $extras3 = $_POST["extras3"];
        $specifics = $_POST["specifics"];


        $sqlUpdateFood = "UPDATE `foods` SET `name`='$name',`category`='$category',`dinetime`='$dinetime',`vege`='$vege',`specifics`='$specifics',`description`='$description',`image1`='$image1',`image2`='$image2',`image3`='$image3',`extras1`='$extras1',`extras2`='$extras2',`extras3`='$extras3',`price`='$price' WHERE `foodid`='$id'";
      
        if(mysqli_query($con,$sqlUpdateFood)){
            echo"Data updated successfully...";

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
            header("location:admin.php");
        }else{
            echo mysqli_error($con);
            die(mysqli_error($con));
        }
      
      }


    // }
    ?>

<?php 
include './footer.php';
?>

    
</body>
</html>