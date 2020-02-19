<?php
require 'config/connectdb.php';

$sql = "DELETE FROM members WHERE id >= '3'";

$query = mysqli_query($connect, $sql);

if($query){
    echo "Delete member success";
}else{
    echo "Fail! to delete new member";
}