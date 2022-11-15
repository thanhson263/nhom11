<?php
    include("./connect.php");
    $ten_khach_hang = $_POST['hoTen'];
    $id = $_POST['id'];
    $sql_change_fullname = "UPDATE customer SET ten_khach_hang = '$ten_khach_hang' WHERE id = $id";
    // echo $sql_change_fullname;
    $result_change_fullname = $conn->query($sql_change_fullname);
    if($result_change_fullname){
        echo "1";
    }else{
        echo "2";
    }
?>