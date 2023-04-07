<?php

require('connect.php');


$sql = "delete from tbl_queue where qdate = :qdate and qnumber = :qnumber";
$stml = $conn->prepare($sql);
$stml->bindParam(':qdate', $_GET['qdate']);
$stml->bindParam(':qnumber', $_GET['qnumber']);
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ($stml->execute()) {

    echo '
        <script type="text/javascript">
        $(document).ready(function(){
                    
                            swal({
                                title: "Success!",
                                text: "Successfuly delete customer",
                                type: "success",
                                timer: 2500,
                                showConfirmButton: false
                            }, function(){
                                    window.location.href = "index.php";
                            });
                        });                    
 
        
        
        </script>
        ';


} else {
    $message = "Fail to delete customer information.";
}

$conn = null;



?>