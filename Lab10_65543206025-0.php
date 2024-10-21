<!DOCTYPE html>
<html>
<head>
    <title>Form Write</title>
</head>
<body>

<h2>Form Write</h2>
<!-- ตรวจสอบให้แน่ใจว่าการส่งข้อมูลไปยัง writefile.php -->
<form action="writefile.php" method="post"> <!-- ใช้ POST method หรือเปลี่ยนเป็น GET หากต้องการ -->
    <label for="name">Name :</label>
    <input type="text" id="name" name="name" required><br><br> <!-- ตรวจสอบว่ามี required -->
    
    <label for="surname">Surname :</label>
    <input type="text" id="surname" name="surname" required><br><br> <!-- ตรวจสอบว่ามี required -->
    
    <input type="submit" value="Save">
</form>

</body>
</html>
