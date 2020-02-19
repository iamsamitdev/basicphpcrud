<?php
require 'config/connectdb.php';

$sql = "UPDATE members SET fullname='Somchai', email='somchai', tel='089547859' WHERE id='1'";

$query = mysqli_query($connect, $sql);

if($query){
    echo "Edit member success";
}else{
    echo "Fail! to edit new member";
}