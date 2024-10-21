<?php
// รหัสเลขประจำตัวนศ.65543206025-0
// เลขคี่ใช้คำสั่ง do While 
echo "<div style='text-align: center; font-family: Arial, sans-serif; margin-top: 50px;'>";
echo "<h1 style='color: #FF0000;'>สูตรคูณเลขคี่แม่ 25 โดยใช้(do while)</h1>";
echo "<h2 style='color: #333;'>รหัสเลขประจำตัว 65543206025-0</h1>";
echo "<div style='border: 2px solid #4CAF50; border-radius: 15px; padding: 20px; width: 300px; margin: 0 auto; box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); background-color: #f9f9f9;'>";

$i = 1;
do {
    echo "<p style='font-size: 18px; color: #333; margin: 10px 0;'>25 x $i = " . (25 * $i) . "</p>";
    $i += 1; // ใช้เลขคี่เท่านั้น
} while ($i <= 12);

echo "</div>";
echo "</div>";
?>
