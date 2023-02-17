<html> <head>
<title> Select to See Detail </title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT * FROM food,menu WHERE food.Menu_ID = menu.Menu_ID";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">F_ID</th>
    <th width="140"> <div align="center">F_Name</th>
    <th width="120"> <div align="center">F_Price</th>
    <th width="120"> <div align="center">F_Description</th>
  </tr>

<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>


  <tr>
    <td>
        <a href="Delete.php?Food_ID=<?php echo $result["Food_ID"];?>">
            <?php echo $result["Food_ID"]; ?></a></td> 
            <td><?php echo $result["Food_Name"]; ?></td>
            <td><?php echo $result["Food_Price"]; ?></td>
            <td><?php echo $result["Food_Description"]; ?></td>
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