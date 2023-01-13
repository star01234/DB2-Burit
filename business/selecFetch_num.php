<?php
try {
    require 'connect.php';
    $sql = "SELECT CustomerID,Name,Birthdate,OutstandingDebt
    FROM customer
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    //แบบที่ 1
    // while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     echo '<br>' .
    //         'รหัสลูกค้าของฉันแบบที่ 1 : ' .
    //         $result['CustomerID'] .
    //         ' วันเกิด : ' .
    //         $result['Birthdate'] .
    //         ' ยอดหนี้ : ' .
    //         $result['OutstandingDebt'];
    // }

    while ($result = $stmt->fetch(PDO::FETCH_NUM)) {
        echo '<br>' .
            'รหัสลูกค้าของฉันแบบที่ 1 : ' .
            $result[0] .
            ' ชื่อ : ' . 
            $result['1'] .
            ' วันเกิด : ' .
            $result['2'] .
            ' ยอดหนี้ : ' .
            $result['3'];
    }
} catch (PDOException $e) {
    echo 'ไม่สามารถประมวลผลข้อมูลได้ : ' . $e->getMessage();
}
$conn = null;
?>
