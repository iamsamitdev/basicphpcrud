<?php
require '../config/connectdb.php';

// รับ id ของ member
$id = $_GET['id'];
// $id = 1;

// เขียนคำสั่ง sql select member
$sql = "SELECT * FROM members WHERE id='$id'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_assoc($query);

// print_r($result);

// การแปลงข้อมูลออกเป็น JSON  Format
echo json_encode($result);