<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // การตรวจสอบแบบกำหนดเองสำหรับการสาธิต
    if ($username === 'root' && $password === '1234') {
        $_SESSION['username'] = $username;
        header("Location: show_customer.php");
        exit();
    } else {
        echo "<p style='color: red;'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }
        .login-container h2 {
            color: #0066cc;
            margin-bottom: 30px;
            font-size: 24px;
        }
        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-container button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #0066cc;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #005bb5;
        }
        .login-container button[type="reset"] {
            background-color: #ed4747;
        }
        .login-container button[type="reset"]:hover {
            background-color: #ed4747;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>ลงชื่อเข้าใช้</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="ชื่อผู้ใช้" required>
            <input type="password" name="password" placeholder="รหัสผ่าน" required>
            <button type="submit" name="login">ลงชื่อเข้าใช้</button>
            <button type="reset">ยกเลิก</button>
        </form>
    </div>
</body>
</html>
