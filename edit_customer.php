<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mystore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    $sql = "SELECT * FROM customer WHERE Customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
        
        if (!empty($customer['Birthdate'])) {
            $birthdate = date('Y-m-d', strtotime($customer['Birthdate']));
        } else {
            $birthdate = '';
        }
    } else {
        echo "ไม่พบข้อมูลลูกค้าที่มี ID: " . htmlspecialchars($customer_id);
        exit;
    }
} else {
    echo "ไม่พบ ID ของลูกค้า!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['Customer_Name'];
    $lastname = $_POST['Customer_Lastname'];
    $gender = $_POST['Gender'];
    $age = $_POST['Age'];
    $birthdate = $_POST['Birthdate'];
    $address = $_POST['Address'];
    $province = $_POST['Province'];
    $zipcode = $_POST['Zipcode'];
    $telephone = $_POST['Telephone'];
    $description = $_POST['Customer_Description'];

    $sql = "UPDATE customer SET Customer_Name=?, Customer_Lastname=?, Gender=?, Age=?, Birthdate=?, Address=?, Province=?, Zipcode=?, Telephone=?, Customer_Description=? WHERE Customer_id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssissssssi", $firstname, $lastname, $gender, $age, $birthdate, $address, $province, $zipcode, $telephone, $description, $customer_id);
    
    if ($stmt->execute()) {
        header("Location: show_customer.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="date"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        .radio-group {
            display: flex;
            gap: 20px;
        }
        .radio-group label {
            display: flex;
            align-items: center;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn {
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
        }
        .btn-submit {
            background-color: #28a745;
        }
        .btn-submit:hover {
            background-color: #218838;
        }
        .btn-cancel {
            background-color: #dc3545;
            margin-left: 10px;
        }
        .btn-cancel:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>แก้ไขข้อมูลลูกค้า</h2>
    <form action="edit_customer.php?id=<?= htmlspecialchars($customer_id) ?>" method="post">
        <input type="hidden" name="customer_id" value="<?= htmlspecialchars($customer_id) ?>">

        <div class="form-group">
            <label for="Customer_Name">ชื่อ:</label>
            <input type="text" id="Customer_Name" name="Customer_Name" value="<?= isset($customer['Customer_Name']) ? htmlspecialchars($customer['Customer_Name']) : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="Customer_Lastname">นามสกุล:</label>
            <input type="text" id="Customer_Lastname" name="Customer_Lastname" value="<?= isset($customer['Customer_Lastname']) ? htmlspecialchars($customer['Customer_Lastname']) : '' ?>" required>
        </div>

        <div class="form-group">
            <label>เพศ:</label>
            <div class="radio-group">
                <label><input type="radio" name="Gender" value="ชาย" <?= isset($customer['Gender']) && $customer['Gender'] == 'ชาย' ? 'checked' : '' ?>> ชาย</label>
                <label><input type="radio" name="Gender" value="หญิง" <?= isset($customer['Gender']) && $customer['Gender'] == 'หญิง' ? 'checked' : '' ?>> หญิง</label>
            </div>
        </div>

        <div class="form-group">
            <label for="Age">อายุ:</label>
            <input type="text" id="Age" name="Age" value="<?= isset($customer['Age']) ? htmlspecialchars($customer['Age']) : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="Birthdate">วัน-เดือน-ปี เกิด:</label>
            <input type="date" id="Birthdate" name="Birthdate" value="<?= isset($birthdate) ? htmlspecialchars($birthdate) : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="Address">ที่อยู่:</label>
            <input type="text" id="Address" name="Address" value="<?= isset($customer['Address']) ? htmlspecialchars($customer['Address']) : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="Province">จังหวัด:</label>
            <input type="text" id="Province" name="Province" value="<?= isset($customer['Province']) ? htmlspecialchars($customer['Province']) : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="Zipcode">รหัสไปรษณีย์:</label>
            <input type="text" id="Zipcode" name="Zipcode" value="<?= isset($customer['Zipcode']) ? htmlspecialchars($customer['Zipcode']) : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="Telephone">โทรศัพท์:</label>
            <input type="text" id="Telephone" name="Telephone" value="<?= isset($customer['Telephone']) ? htmlspecialchars($customer['Telephone']) : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="Customer_Description">รายละเอียดอื่นๆ:</label>
            <textarea id="Customer_Description" name="Customer_Description" rows="4"><?= isset($customer['Customer_Description']) ? htmlspecialchars($customer['Customer_Description']) : '' ?></textarea>
        </div>

        <div class="btn-container">
            <button type="submit" class="btn btn-submit">แก้ไขข้อมูลลูกค้า</button>
            <a href="show_customer.php" class="btn btn-cancel">ยกเลิก</a>
        </div>
    </form>
</div>

</body>
</html>