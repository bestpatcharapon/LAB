<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab7 - ผลการลงทะเบียน</title>
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

        .result-container {
            width: 90%;
            max-width: 400px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
        }

        h3 {
            color: #4CAF50;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        .success {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }

        p {
            margin: 5px 0;
            font-size: 14px;
        }

        .detail {
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .back-btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .back-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="result-container">
        <h3>ผลการลงทะเบียน</h3>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $email = $_POST['email'];
            $terms = isset($_POST['terms']) ? true : false;

            $errors = [];

            // Check password match
            if ($password !== $confirm_password) {
                $errors[] = 'รหัสผ่านไม่ตรงกัน!!';
            }

            // Check date validation
            $selected_date = "$day-$month-$year";
            if (!checkdate(date('m', strtotime($month)), $day, $year - 543)) {
                $errors[] = 'วันที่ไม่ถูกต้อง!!';
            }

            // Check terms agreement
            if (!$terms) {
                $errors[] = 'ไม่ได้ยอมรับข้อตกลง!!';
            }

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<p class='error'>$error</p>";
                }
            } else {
                echo "<p class='success'>ลงทะเบียนสำเร็จ!</p>";
                echo "<div class='detail'>";

                // Create array for Thai months
                $thai_months = [
                    'January' => 'มกราคม', 'February' => 'กุมภาพันธ์', 'March' => 'มีนาคม',
                    'April' => 'เมษายน', 'May' => 'พฤษภาคม', 'June' => 'มิถุนายน',
                    'July' => 'กรกฎาคม', 'August' => 'สิงหาคม', 'September' => 'กันยายน',
                    'October' => 'ตุลาคม', 'November' => 'พฤศจิกายน', 'December' => 'ธันวาคม'
                ];

                // Convert English month to Thai
                $thai_month = $thai_months[$month];

                echo "<p>ชื่อ-นามสกุล: $first_name $last_name</p>";
                echo "<p>เพศ: $gender</p>";
                echo "<p>วันเกิด: $day $thai_month พ.ศ. $year</p>";
                echo "<p>Username: $username</p>";

                // Mask the password by showing asterisks
                $masked_password = str_repeat('*', strlen($password));
                echo "<p>Password: $masked_password</p>";

                echo "<p>E-mail: $email</p>";
                echo "</div>";

                // Display real-time registration date in Thai
                date_default_timezone_set('Asia/Bangkok');

                // Convert the registration date to Thai format
                setlocale(LC_TIME, 'th_TH.UTF-8');
                $thai_registration_date = strftime('%A %d %B %Y เวลา %H:%M:%S', time());

                // Convert English day and month to Thai
                $thai_registration_date = str_replace(
                    ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                    ['วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์', 'วันอาทิตย์'],
                    $thai_registration_date
                );
                $thai_registration_date = str_replace(
                    ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                    $thai_registration_date
                );

                echo "<p>วันที่ลงทะเบียน: $thai_registration_date</p>";
            }
        }
        ?>

        <a class="back-btn" href="Lab7_65543206025-0.php">กลับไปที่ฟอร์ม</a>
    </div>
</body>

</html>
