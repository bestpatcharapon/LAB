<?php
session_start();
session_destroy(); // ล้าง session ทั้งหมด

// แสดงผลลัพธ์หน้า logout.php
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ออกจากระบบ</title>
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .logout-message {
            border: 2px solid black;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            border-radius: 10px;
            background-color: #fffaf0;
            width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .logout-message a {
            color: #800080; /* สีม่วง */
            text-decoration: none;
            font-weight: bold;
        }
        .logout-message a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="logout-message">
        <p>ออกจากระบบแล้ว!!</p>
        <a href="login.php">ลงชื่อเข้าใช้อีกครั้ง</a>
    </div>
</body>
</html>
