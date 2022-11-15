<?php
    include("./connect.php");
    $id_cart = rand(0,99);
    $ten_khach_hang = $_POST['ten_khach_hang'];
    $email = $_POST['email'];
    $dia_chi = $_POST['dia_chi'];
    $sdt = $_POST['sdt'];
    $phuong_thuc_thanh_toan = $_POST['phuong_thuc_thanh_toan'];
    if(strlen($ten_khach_hang) > 0 && strlen($email) > 0 && strlen($dia_chi) > 0 && strlen($sdt) > 0 && strlen($phuong_thuc_thanh_toan) > 0){
        $sql_insert_cart = "INSERT INTO payment VALUES (null,$id_cart,'$ten_khach_hang','$sdt','$email','$dia_chi','$phuong_thuc_thanh_toan')";
        // echo $sql_insert_cart;
        $result_insert_cart = $conn -> query($sql_insert_cart);
        if($result_insert_cart){
            // $id_cart = $conn->insert_id;
            echo $id_cart;
        }
    }else{
        echo "Lỗi";
    }
?>