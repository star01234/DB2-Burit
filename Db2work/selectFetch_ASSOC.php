<?php
try {
    require 'connect.php';
    $sql = "SELECT * FROM customer";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    //แบบที่ 1
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<br>' .
            'รหัสลูกค้าของฉันแบบที่ 1 : ' .
            $result['CustomerID'] .
            ' วันเกิด : ' .
            $result['Birthdate'] .
            ' ยอดหนี้ : ' .
            $result['OutstandingDebt'];
    }
} catch (PDOException $e) {
    echo 'ไม่สามารถประมวลผลข้อมูลได้ : ' . $e->getMessage();
}
$conn = null;
?>
