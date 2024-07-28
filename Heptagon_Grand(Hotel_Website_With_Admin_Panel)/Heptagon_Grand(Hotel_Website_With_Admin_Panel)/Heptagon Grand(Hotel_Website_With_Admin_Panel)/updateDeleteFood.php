<?php 
include './connect.php';
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
    <title>Update Delete Food</title>
    <link rel="stylesheet" href="./update_delete.css">
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

<div class="container">
        <ul>
        <?php 

$sqlGetfoods = "SELECT `foodid`,`name` FROM `foods`";


$result = $con->query(($sqlGetfoods));

if($result){

  while($row = $result->fetch_assoc()) {
      
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mobile"]. "<br>";
   $foodid = $row["foodid"];
   $name = $row["name"];

   

echo'
<li>'.$name.'<span class="buttons-up-del"><button class="update"><a href="./updateFood.php?foodid='.$foodid.'">Update</a></button><button class="delete" ><a href="./delete.php?id='.$foodid.'&tableName=foods">Delete</a></button><span></li>
';

}
}
?>

   


</ul>
</div>

<?php 
include './footer.php';
?>


    
</body>
</html>