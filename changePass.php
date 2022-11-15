<?php
    include("./connect.php");
    $tenTK = $_POST['tenTK'];
    $matkhau = $_POST['matKhau'];
    $matkhau_mahoa = md5($matkhau);
    $sql_update_password = "UPDATE customer SET matkhau = '$matkhau_mahoa' WHERE sdt = '$tenTK'";
    $result_update_password = $conn->query($sql_update_password);
    if($result_update_password){
        echo "1";
    }else{
        echo "0";
    }
?>