<?php
require '../config/connectdb.php';

# Select ข้อมูลใหม่ออกมา
// เขียนคำสั่ง sql select member
$sql = "SELECT * FROM members ORDER BY id DESC";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_assoc($query);

// การแปลงข้อมูลออกเป็น JSON  Format
echo json_encode($result);
