<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>030-Burit </title>
</head>
<body>
    
<?php
require "connect.php";

if (isset($_GET["Phone_Number"])) 
{
    $strPhone_Number = $_GET["Phone_Number"];
    echo "<br>" . "strPhone_Number = " .$strPhone_Number;
    $sql = "SELECT * FROM customer where Phone_Number LIKE '%" . $strPhone_Number . "%'";
    echo "<br>" . " sql = " .$sql . "<br>";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

}
?>
</br>
    <table width="300" border="3">
  <tr>
    <th width="325">รหัสลูกค้าสมาชิก</th>
    <td width="240"><?php echo $result["Customer_ID"]; ?></td>
  </tr>
  <tr>
    <th width="130">ชื่อ </th>
    <td><?php echo $result["First_Name"]; ?></td>
  </tr>
  <tr>
    <th width="130">นามสกุล </th>
    <td><?php echo $result["Last_Name"]; ?></td>
  </tr>
  <tr>
    <th width="130">เบอร์โทร </th>
    <td><?php echo $result["Phone_Number"]; ?></td>
  </tr>
  </table>

</body>
</html>