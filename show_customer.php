<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "mystore"; 

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ดึงข้อมูลจากตาราง customer
$sql = "SELECT Customer_id, Customer_Name, Customer_Lastname, Province, Telephone FROM customer";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แสดงข้อมูลลูกค้า</title>
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #0066cc;
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
        }
        .btn-add {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background-color: #28a745;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 30px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-add:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #6e92e0;
            color: white;
            font-weight: bold;
        }
        td {
            color: #333;
            background-color: #f8f9fa;
        }
        td:nth-child(even) {
            background-color: #e9ecef;
        }
        .btn-action {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-edit {
            background-color: #ffc107;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-action img {
            width: 18px;
            height: 18px;
            margin-right: 5px;
            transition: transform 0.2s;
        }
        .btn-action:hover {
            transform: scale(1.1);
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        /* Media query for responsiveness */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }
            .btn-add {
                padding: 10px 20px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<h2>ข้อมูลลูกค้า</h2>
<p>ชื่อผู้ใช้: <?php echo $_SESSION['username']; ?></p>
<a href="add_customer.php" class="btn-add">เพิ่มข้อมูลลูกค้า</a>

<table>
    <tr>
        <th>Id</th>
        <th>ชื่อ - สกุล</th>
        <th>จังหวัด</th>
        <th>โทรศัพท์</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Customer_id"] . "</td>";
            echo "<td>" . $row["Customer_Name"] . " " . $row["Customer_Lastname"] . "</td>";
            echo "<td>" . $row["Province"] . "</td>";
            echo "<td>" . $row["Telephone"] . "</td>";
            echo "<td><a href='edit_customer.php?id=" . $row["Customer_id"] . "' class='btn-action btn-edit'><img src='edit.png' alt='Edit'>Edit</a></td>";
            echo "<td><a href='delete_customer.php?id=" . $row["Customer_id"] . "' class='btn-action btn-delete' onclick='return confirm(\"คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?\");'><img src='delete.png' alt='Delete'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>ไม่มีข้อมูลลูกค้า</td></tr>";
    }
    ?>

</table>

<a href="logout.php">ลงชื่อออก</a>

</body>
</html>

<?php
$conn->close();
?>
