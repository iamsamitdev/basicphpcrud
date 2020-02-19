<?php
require 'config/connectdb.php';

$keyword_name = "สา";
$keyword_email = "asfsafsam";
$keyword_tel = "asfsa";

$sql = "SELECT * FROM members 
            WHERE fullname LIKE '%$keyword_name%' 
            OR email LIKE '%$keyword_email%' 
            OR tel LIKE '%$keyword_tel%'";
$query = mysqli_query($connect, $sql);
while($result = mysqli_fetch_assoc($query))
{
    echo "ID: ". $result['id'];
    echo "Fullname: ". $result['fullname'];
    echo "Email: ". $result['email'];
    echo "Password: ". $result['password'];
    echo "Tel: ". $result['tel'];
    echo "<br>";
}