<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Lab7 - ฟอร์มข้อมูลส่วนตัว</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 90%;
            max-width: 400px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 10px;
            box-sizing: border-box;
        }

        h3 {
            color: #4CAF50;
            font-weight: 600;
            text-align: center;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 8px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 3px;
            font-size: 12px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 5px;
            margin: 2px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 12px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        .form-group-inline {
            display: flex;
            justify-content: space-between;
        }

        .form-group-inline select {
            width: calc(33% - 3px);
        }

        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .terms {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .terms input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="index2.php" method="post">
            <h3>ข้อมูลส่วนตัว</h3>
            <div class="form-group">
                <label for="first_name">ชื่อ:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">นามสกุล:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label>เพศ:</label>
                <input type="radio" id="ชาย" name="gender" value="ชาย" required> ชาย
                <input type="radio" id="หญิง" name="gender" value="หญิง"> หญิง
            </div>
            <div class="form-group">
                <label for="birth_date">วันเกิด:</label>
                <div class="form-group-inline">
                    <select id="day" name="day" required>
                        <?php for ($i = 1; $i <= 31; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select>
                    <select id="month" name="month" required>
                        <option value="January">มกราคม</option>
                        <option value="February">กุมภาพันธ์</option>
                        <option value="March">มีนาคม</option>
                        <option value="April">เมษายน</option>
                        <option value="May">พฤษภาคม</option>
                        <option value="June">มิถุนายน</option>
                        <option value="July">กรกฎาคม</option>
                        <option value="August">สิงหาคม</option>
                        <option value="September">กันยายน</option>
                        <option value="October">ตุลาคม</option>
                        <option value="November">พฤศจิกายน</option>
                        <option value="December">ธันวาคม</option>
                    </select>
                    <select id="year" name="year" required>
                        <?php 
                        $currentYear = date('Y') + 543; 
                        for ($i = 1900 + 543; $i <= $currentYear; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <h3>ข้อมูลบัญชี</h3>
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">รหัสผ่าน:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">ยืนยันรหัสผ่าน:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="email">อีเมล:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="terms">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">ฉันยอมรับ <a href="#">ข้อตกลงในการให้บริการ</a> และ <a href="#">นโยบายความเป็นส่วนตัว</a></label>
            </div>
            <input type="submit" value="ส่งข้อมูล">
        </form>
    </div>
</body>

</html>
