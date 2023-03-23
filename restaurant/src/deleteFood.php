<?php

require('../connect.php');


$sql = "delete from food where FoodID = :FoodID";
$stml = $conn->prepare($sql);
$stml->bindParam(':FoodID',$_GET['FoodID']);

if($stml->execute()){
    $message = "Successfully delete food".$_GET['FoodID'].".";
}else{
    $message = "Fail to delete food information.";
}
echo $message;
$conn = null;


header("Location:index.php");
?>
