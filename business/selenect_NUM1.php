<?php
try {
    require 'connect.php';
    $sql = "SELECT CountryCode,CountryName
    FROM country";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetch(PDO::FETCH_NUM)) {
        echo '<br>' .
            'ชื่อประเทศ : ' .
            $result[0] .
            ' ชื่อ : ' . 
            $result['1'] ;
            
    }
} catch (PDOException $e) {
    echo 'ไม่สามารถประมวลผลข้อมูลได้ : ' . $e->getMessage();
}
$conn = null;
?>
