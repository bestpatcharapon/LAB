<?php
$servername = "localhost";
$username = "root"; 
$password = "1234"; 
$dbname = "mystore"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];
    $sql = "DELETE FROM customer WHERE Customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);

    if ($stmt->execute()) {
        header("Location: show_customer.php?message=ลบข้อมูลลูกค้าเรียบร้อยแล้ว");
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการลบข้อมูล: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ไม่พบ ID ของลูกค้า!";
}

$conn->close();
?>
