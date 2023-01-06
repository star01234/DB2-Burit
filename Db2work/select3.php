<?php
require "connect.php";

// ลองให้โชว์ข้อมูล customer

$sql = 
"SELECT customer.CustomerID ,customer.Name, customer.OutstandingDebt, country.CountryName
FROM customer,country
WHERE customer.CountryCode = country.CountryCode"; 

$stmt = $conn->prepare($sql);
$stmt->execute();

echo '<br>';

$result = $stmt->fetchAll();
//print_r($result);

foreach ($result as $r) {
print $r['CustomerID'] .'  '. $r['Name'].' '.$r['OutstandingDebt'].'  '.$r['CountryName'] .'<br>';
}
?>