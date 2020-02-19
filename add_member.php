<?php
require 'config/connectdb.php';

$sql = "INSERT INTO members(fullname,email,password,tel,status) 
            VALUES('John','john@gmail.com','1234','0856987489','1')";
$query = mysqli_query($connect, $sql);

if($query){
    echo "Add member success";
}else{
    echo "Fail! to add new member";
}