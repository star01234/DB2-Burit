<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>030-Burit</title>
</head>
<body>

<?php
require "connect.php";

$sql = "SELECT * FROM food,menu WHERE food.Menu_ID = menu.Menu_ID "; 

$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">ชื่ออาหาร </th>
    <th width="140"> <div align="center">รายละเอียด </th>
    <th width="120"> <div align="center">เมนู </th>
    <th width="100"> <div align="center">ราคา </th>
  </tr>

<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

  <tr>
    <td><?php echo $result["Food_Name"]; ?></td>
    <td><?php echo $result["Food_Description"]; ?></td>
    <td><?php echo $result["Menu_Name"]; ?></td>
    <td><?php echo $result["Food_Price"]; ?></td></tr>

<?php
  }
?>

</table>

<?php
$conn = null;
?>
</body>
</html>