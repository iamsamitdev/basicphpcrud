<?php
require '../config/connectdb.php';

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$password=$_POST['password'];
$tel=$_POST['tel'];
$status=$_POST['status'];

$sql = "INSERT INTO members(fullname,email,password,tel,status) 
            VALUES('$fullname','$email','$password','$tel','$status')";
$query = mysqli_query($connect, $sql);

if($query){
    echo "add success";
}else{
    echo "fail!";
}