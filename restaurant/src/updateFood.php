<?php

if (isset($_POST['FoodID'])) {
    require '../connect.php';

    //$FoodID = $_POST['FoodID'];
    //$FoodName = $_POST['FoodName'];
    //$FoodPrice = $_POST['FoodPrice'];

    //echo 'FoodID = ' . $FoodID;
    //echo 'FoodName = ' . $FoodName;
    //echo 'FoodPrice = ' . $Price; 

    
    $stmt = $conn->prepare(
        'UPDATE  food Set FoodName=:FoodName, FoodPrice=:FoodPrice ,FoodTypeID=:FoodTypeID WHERE FoodID=:FoodID'
    );
    
    $stmt->bindparam(':FoodName',$_POST['FoodName']);
    $stmt->bindparam(':FoodPrice',$_POST['FoodPrice']);
    $stmt->bindparam(':FoodTypeID',$_POST['FoodTypeID']);
    $stmt->bindparam(':FoodID', $_POST['FoodID']);
    $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "สำเร็จ!",
                text: "ได้ทำการ Update เรียบร้อยแล้ว",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
?>