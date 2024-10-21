<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Grade Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            color: #555;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>แสดงเกรดที่ได้</h2>
        
        <form method="get" action="">
            <label for="score">กรุณาป้อนคะแนน:</label>
            <input type="number" id="score" name="score" min="0" max="100" required>
            <input type="submit" value="คำนวณเกรด">
        </form>
        
        <?php
        if (isset($_GET['score'])) {
            $score = $_GET['score']; // รับค่าคะแนนจากฟอร์ม

            if ($score >= 80) {
                echo "<div class='result' style='background-color: green; color: white;'>$score คะแนน: ได้รับระดับคะแนน A</div>";
            } elseif ($score >= 75) {
                echo "<div class='result' style='background-color: green; color: white;'>$score คะแนน: ได้รับระดับคะแนน B+</div>";
            } elseif ($score >= 70) {
                echo "<div class='result' style='background-color: green; color: white;'>$score คะแนน: ได้รับระดับคะแนน B</div>";
            } elseif ($score >= 65) {
                echo "<div class='result' style='background-color: yellow;'>$score คะแนน: ได้รับระดับคะแนน C+</div>";
            } elseif ($score >= 60) {
                echo "<div class='result' style='background-color: yellow;'>$score คะแนน: ได้รับระดับคะแนน C</div>";
            } elseif ($score >= 55) {
                echo "<div class='result' style='background-color: yellow;'>$score คะแนน: ได้รับระดับคะแนน D+</div>";
            } elseif ($score >= 50) {
                echo "<div class='result' style='background-color: yellow;'>$score คะแนน: ได้รับระดับคะแนน D</div>";
            } else {
                echo "<div class='result' style='background-color: red; color: white;'>$score คะแนน: ได้รับระดับคะแนน F</div>";
            }
        }
        ?>
    </div>
</body>
</html>
