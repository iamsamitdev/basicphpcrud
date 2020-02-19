<?php
require 'config/connectdb.php';

// เขียนคำสั่ง sql select member
$sql = "SELECT * FROM members";
$query = mysqli_query($connect, $sql);

// echo "<pre>";
// print_r($result);
// echo "</pre>";

// นับแถวรายการข้อมูล
$row = mysqli_num_rows($query);

echo "Found : ". $row . " rows<br>";

while($result = mysqli_fetch_assoc($query))
{
    echo "ID: ". $result['id'];
    echo "Fullname: ". $result['fullname'];
    echo "Email: ". $result['email'];
    echo "Password: ". $result['password'];
    echo "Tel: ". $result['tel'];
    echo "<br>";
}