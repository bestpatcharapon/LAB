<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // ใช้ POST method ตามที่คุณระบุในฟอร์ม
    // รับข้อมูลจากฟอร์ม
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    // จัดการเปิดไฟล์และเขียนข้อมูล
    $file = fopen("myfile.txt", "a"); // ใช้โหมด 'a' เพื่อเพิ่มข้อมูลใหม่ต่อจากข้อมูลเก่า
    if ($file) {
        // เขียนข้อมูลลงในไฟล์
        fwrite($file, "My Name is " . $name . "\n");
        fwrite($file, "My Surname is " . $surname . "\n");
        fwrite($file, "-------------------------\n");
        fclose($file);
        
        // แสดงข้อความยืนยัน
        echo "Data saved successfully!";
    } else {
        echo "Unable to open file.";
    }
} else {
    echo "No data submitted.";
}
?>
