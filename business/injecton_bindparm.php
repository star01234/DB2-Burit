<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Test SQL injection</h1>
    <form action="injecton_bindparm.php" method="GET">
        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br> <br>
        <input type="submit">
</form>
</body>
</html>

<?php
if (isset($_GET['CustomerID'])):
    echo "<br> Burit".$_GET['CustomerID'];
    require 'connect.php';
    $count = 0;
    $sql = "SELECT * FROM customer where CustomerID = :CustomerID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID',$_GET['CustomerID']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<br>***********<br>";
    while ($row =$stmt->fetch()){
        echo $row['CustomerID'].''.$row['Name']."<br/>";
        $count++;
    }
    //echo "count...".$count;
    if ($count==0)
        echo"<br>No data...<br>";
        $conn = null;
endif;
?>

