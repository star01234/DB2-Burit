<html> <head>
<title> Udsanee-Display customer</title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT * FROM country
";
 
$stmt = $conn->prepare($sql);
 
$stmt->execute();
?>
 
<table width="250" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสประเทศ </th>
    <th width="140"> <div align="center">ชื่อประเทศ </th>
  </tr>
 
<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
 
  <tr>
    <td><a href="detailcountry.php?CountryCode=<?php echo $result["CountryCode"];?>">
       <?php echo $result["CountryCode"]; ?>     </a></td>
    <td>    <?php echo $result["CountryName"]; ?>     </td>
    
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