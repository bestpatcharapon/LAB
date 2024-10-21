<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "mystore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dob_day = $_POST['dob_day'];
    $dob_month = $_POST['dob_month'];
    $dob_year = $_POST['dob_year'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $phone = $_POST['phone'];
    $details = $_POST['details'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $birthdate = new DateTime("$dob_year-$dob_month-$dob_day");
    $today = new DateTime();
    $age = $today->diff($birthdate)->y;

    $sql = "INSERT INTO customer (Customer_Name, Customer_Lastname, Gender, Birthdate, Age, Address, Province, Zipcode, Telephone, Customer_Description, username, password)
    VALUES ('$firstname', '$lastname', '$gender', '$dob_year-$dob_month-$dob_day', $age, '$address', '$province', '$zipcode', '$phone', '$details', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='success-message'>เพิ่มข้อมูลลูกค้าสำเร็จ</div>";
    } else {
        $message = "<div class='error-message'>ข้อผิดพลาด: " . $conn->error . "</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลลูกค้า</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding-top: 30px;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .form-container:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            color: #2196F3;
            margin-bottom: 25px;
            font-size: 1.8em;
        }

        label {
            font-weight: bold;
            margin-top: 12px;
            display: block;
            color: #333;
            font-size: 1.1em;
        }

        input[type="text"], input[type="password"], select, textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            transition: border-color 0.3s, background-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus, select:focus, textarea:focus {
            border-color: #2196F3;
            background-color: #eaf5ff;
            outline: none;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            background-color: #2196F3;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #1976D2;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .gender-container {
            display: flex;
            gap: 20px;
            margin: 10px 0;
        }

        .gender-container input {
            margin-right: 6px;
        }

        .success-message, .error-message {
            text-align: center;
            font-size: 1.2em;
            margin-top: 25px;
            padding: 12px;
            border-radius: 6px;
        }

        .success-message {
            color: #4CAF50;
            border: 1px solid #4CAF50;
            background-color: #e8f7e8;
        }

        .error-message {
            color: #f44336;
            border: 1px solid #f44336;
            background-color: #fdecea;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 20px;
            }

            button {
                font-size: 16px;
                padding: 12px;
            }

            h2 {
                font-size: 1.6em;
            }
        }
    </style>
    <script>
        function validateForm() {
            const firstname = document.forms["customerForm"]["firstname"].value;
            const lastname = document.forms["customerForm"]["lastname"].value;
            const gender = document.forms["customerForm"]["gender"].value;
            const dob_day = document.forms["customerForm"]["dob_day"].value;
            const dob_month = document.forms["customerForm"]["dob_month"].value;
            const dob_year = document.forms["customerForm"]["dob_year"].value;
            const address = document.forms["customerForm"]["address"].value;
            const province = document.forms["customerForm"]["province"].value;
            const zipcode = document.forms["customerForm"]["zipcode"].value;
            const phone = document.forms["customerForm"]["phone"].value;
            const username = document.forms["customerForm"]["username"].value;
            const password = document.forms["customerForm"]["password"].value;

            if (!firstname || !lastname || !gender || !dob_day || !dob_month || !dob_year || !address || !province || !zipcode || !phone || !username || !password) {
                alert("กรุณากรอกข้อมูลให้ครบ!!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

<div class="form-container">
    <h2>เพิ่มข้อมูลลูกค้า</h2>
    <?= $message; ?>
    <form name="customerForm" action="add_customer.php" method="POST" onsubmit="return validateForm()">
        <label>ชื่อ:</label>
        <input type="text" name="firstname" required>
        
        <label>นามสกุล:</label>
        <input type="text" name="lastname" required>
        
        <label>เพศ:</label>
        <div class="gender-container">
            <input type="radio" name="gender" value="ชาย" required> ชาย
            <input type="radio" name="gender" value="หญิง" required> หญิง
        </div>

        <label>วันเกิด:</label>
        <select name="dob_day" required>
            <option value="">วัน</option>
            <?php
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        
        <select name="dob_month" required>
            <option value="">เดือน</option>
            <?php
            $months = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
            foreach ($months as $index => $month) {
                echo "<option value='" . ($index + 1) . "'>$month</option>";
            }
            ?>
        </select>
        
        <select name="dob_year" required>
            <option value="">ปี</option>
            <?php
            $current_year = date("Y");
            for ($i = $current_year - 100; $i <= $current_year; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <label>ที่อยู่:</label>
        <input type="text" name="address" required>

        <label>จังหวัด:</label>
    <select name="province" required>
        <option value="">เลือกจังหวัด</option>
        <option value="เชียงใหม่">เชียงใหม่</option>
        <option value="เชียงราย">เชียงราย</option>
        <option value="ลำปาง">ลำปาง</option>
        <option value="ลำพูน">ลำพูน</option>
        <option value="พะเยา">พะเยา</option>
        <option value="แพร่">แพร่</option>
        <option value="น่าน">น่าน</option>
        <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
        <!-- เพิ่มจังหวัดอื่นๆ ในภาคเหนือตอนบนถ้ามี -->
    </select>


        <label>รหัสไปรษณีย์:</label>
        <input type="text" name="zipcode" required>

        <label>โทรศัพท์:</label>
        <input type="text" name="phone" required>

        <label>รายละเอียด:</label>
        <textarea name="details" rows="4"></textarea>

        <label>ชื่อผู้ใช้:</label>
        <input type="text" name="username" required>

        <label>รหัสผ่าน:</label>
        <input type="password" name="password" required>

        <button type="submit">เพิ่มข้อมูลลูกค้า</button>
    </form>
</div>

</body>
</html>
