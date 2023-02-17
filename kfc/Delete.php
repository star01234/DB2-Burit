<?php

require "connect.php";

    $sql = "DELETE from food WHERE Food_ID = :Food_ID"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':Food_ID',$_GET['Food_ID']);

    if($stmt->execute()){
        $message = "Successfully delete" .$_GET['Food_ID'].".";
        header("Location:/DB2-Burit/kfc/ShowMenu.php");
    }else{
        $message = "Fail to delete";
    }
    echo $message;
    $conn = null;

    ?>  