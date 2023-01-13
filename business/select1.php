<?php
require "connect.php";

// ลองให้โชว์ข้อมูล customer

$sql = "SELECT * FROM customer"; 
$stmt = $conn->prepare($sql);
$stmt->execute();

echo '<br>';

$result = $stmt->fetchAll();
//print_r($result);

foreach ($result as $r) {
print $r['CustomerID'] .'  '. $r['Name']. '<br>';
}
?>