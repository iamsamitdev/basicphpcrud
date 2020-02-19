<?php
require '../config/connectdb.php';
// รับ id ของ member
$id = $_GET['id'];
$sql = "DELETE FROM members WHERE id = '$id'";
$query = mysqli_query($connect, $sql);

if($query){
    echo "delete success";
}else{
    echo "delete fail";
}
