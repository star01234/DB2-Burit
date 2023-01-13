<?php
try {
    require 'connect.php';
    $sql = "SELECT * FROM country";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    //แบบที่ 1
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<br>' .
            'ชื่อประเทศ  : ' .
            $result['CountryCode'] .
            ' ชื่อประเทศ : ' .
            $result['CountryName'] ;
            
    }
} catch (PDOException $e) {
    echo 'ไม่สามารถประมวลผลข้อมูลได้ : ' . $e->getMessage();
}
$conn = null;
?>
