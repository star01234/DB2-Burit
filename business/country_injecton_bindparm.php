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
    <form action="country_injecton_bindparm.php" method="GET">
        <input type="text" placeholder="Enter CountryCode" name="CountryCode">
        <br> <br>
        <input type="submit">
</form>
</body>
</html>

<?php
if (isset($_GET['CountryCode'])):
    echo "<br> Burit".$_GET['CountryCode'];
    require 'connect.php';
    $count = 0;
    $sql = "SELECT * FROM country where CountryCode = :CountryCode";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CountryCode',$_GET['CountryCode']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<br>***********<br>";
    
    while ($row =$stmt->fetch()){
        echo $row['CountryCode'].''.$row['CountryName']."<br/>";
        $count++;
    }
    //echo "count...".$count;
    if ($count==0)
        echo"<br>No data...<br>";
        $conn = null;
endif;
?>