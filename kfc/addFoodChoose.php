<?php
   require 'connect.php';
   $sql_select = "SELECT * FROM menu";
   $stmt = $conn->prepare($sql_select);
    $stmt->execute();

if(!empty($_POST['Food_ID']) && !empty($_POST['Food_Name']) && !empty($_POST['Food_Description']) && !empty($_POST['Food_Price']) && !empty($_POST['Menu_ID'])):

    $sql_insert="INSERT INTO food VALUES (:Food_ID, :Food_Name, :Food_Description, :Food_Price, :Menu_ID)";
    
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':Food_ID', $_POST['Food_ID']);
    $stmt->bindParam(':Food_Name', $_POST['Food_Name']);
    $stmt->bindParam(':Food_Description', $_POST['Food_Description']);
    $stmt->bindParam(':Food_Price', $_POST['Food_Price']);
    $stmt->bindParam(':Menu_ID', $_POST['Menu_ID']);

    if($stmt->execute()):
        $message = 'Suscessfully add new food';
        header("Location:/DB2-Burit/kfc/ShowMenu.php");
    else:
    $message = 'Fail to add new food';
    endif;
    echo $message;
    $conn = null;
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>030-Burit</title>
</head>

<body>
 
<h1>เพิ่มข้อมูลอาหาร</h1>
<form action="addFoodChoose.php" method="POST">
<input type="text" placeholder="กรุณาใส่รหัสอาหาร" name="Food_ID">
<br></br>
<input type="text" placeholder="กรุณาใส่ชื่อรายการอาหาร" name="Food_Name">
<br></br>
<input type="text" placeholder="กรุณาใส่ราคา" name="Food_Price">
<br></br>
<textarea type="text" placeholder="กรุณาใส่รายละเอียดอาหาร" name="Food_Description" rows="4" cols="50"></textarea>
<br></br>

<label>Select a Menu</label>
<select name="Menu_ID">
<?php
    while ($cc = $stmt->fetch(PDO::FETCH_ASSOC)):
?>
<option value="<?php echo $cc["Menu_ID"]; ?>">
<?php echo $cc["Menu_Name"]; ?>
    </option>
    <?php
    endwhile;
    ?>
</select>
<br></br>

<input type="submit">
</form>

</body>
</html>