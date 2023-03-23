<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<title>User Registration</title>
</head>
<body>


<?php
require '../connect.php';

$sql_select = 'select * from foodtype order by FoodTypeID';
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();

if (isset($_POST['submit'])) {
    
    if (!empty($_POST['FoodID']) && !empty($_POST['FoodName'])) {
        echo '<br>' . $_POST['FoodID'];
        //require 'connect.php';

        $sql = "insert into food values (:FoodID, :FoodName, :FoodPrice, :FoodTypeID)";;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':FoodID', $_POST['FoodID']);
        $stmt->bindParam(':FoodName', $_POST['FoodName']);
        $stmt->bindParam(':FoodPrice', $_POST['FoodPrice']);
        $stmt->bindParam(':FoodTypeID', $_POST['FoodTypeID']);
        //$stmt->bindParam(':CountryCode', $_POST['CountryCode']);
        //$stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);
        

        try {
            if ($stmt->execute()):
                $message = 'Successfully add new food';
            else:
                $message = 'Fail to add new food';
            endif;
            echo $message;
        } catch (PDOException $e) {
            echo 'Fail! ' . $e;
        }

        $conn = null;
    }

    header("Location:index.php");
}
?>



    <div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
            <h3>ฟอร์มเพิ่มข้อมูลลูกค้า</h3>
            <form  action="addFood_dropdown.php" method="POST">
            <br>
            <input type="text" placeholder="Enter Your FoodID" name="FoodID"> 
            <br> <br>
            <input type="text" placeholder="Enter Your FoodName" name="FoodName">
            <br> <br>
            <input type="number" placeholder="Enter Your FoodPrice" name="FoodPrice">
            <br> <br>   
            <label>Select a country code</label>
                <select name="FoodTypeID">
                    <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $cc['FoodTypeID']; ?>">
                            <?php echo $cc['FoodTypeName']; ?>
                        </option>
                    <?php } ?>
                </select>       
            <br> <br>

            <input type="submit" value="Submit" name="submit" />
            </form>
            </div>
        </div>
    </div>
</body>
</html>



