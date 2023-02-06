<html> <head>
<title> Udsanee-Display customer in table</title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT CountryCode,CountryName FROM country";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="250" border="1">
  <tr>
    <th width="140"> <div align="center">รหัสประเทศ </th>
    <th width="140"> <div align="center">ชื่อประเทศ </th>
  </tr>

<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

  <tr>
   <td><?php echo $result["CountryCode"]; ?></td>
    <td><?php echo $result["CountryName"]; ?></td>
    
  </tr>

<?php
  }
?>

</table>

<?php
$conn = null;
?>
</body>  
</html>