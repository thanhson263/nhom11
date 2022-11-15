<?php
    include("./connect.php");
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $link_anh = "http://192.168.43.42/FricaShop/admin/img/white_background.jpeg";
    $tenkhachhang = '0123456789abcdefghijklmnopqrstuvwxyz';
    $ma_hoa_ten_kh = substr(str_shuffle($tenkhachhang),0,10);
    $sql_check_tk = "SELECT * FROM customer WHERE sdt = '$taikhoan' AND matkhau = '$matkhau'";
    $result_check_tk = $conn ->query($sql_check_tk);
    if($result_check_tk -> num_rows == 0){
        $sql_register = "INSERT INTO customer VALUES (null,'$link_anh','$ma_hoa_ten_kh',0,'$taikhoan','','','$matkhau')";
        echo $sql_register;
        $result_register = $conn -> query($sql_register);
        if($result_register){
            echo "S";
        }
    }else{
        echo "F";
    }
    

?>