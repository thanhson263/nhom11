<?php
    include("./connect.php");
    include("./model/user.php");
    $sdt = $_POST['sdt'];
    $matkhau = $_POST['matKhau'];
    $mat_khau_ma_hoa = md5($matkhau);
    $sql_login = "SELECT * FROM customer WHERE sdt = '$sdt' AND matkhau='$mat_khau_ma_hoa'";
    // echo $sql_login;
    $result = $conn -> query($sql_login);
    if($result->num_rows > 0){
        $row_select = $result->fetch_array();
        $array_sdt = [];
        $get_sdt = new User($row_select['id'],$row_select['hinh_anh'],$row_select['ten_khach_hang'],$row_select['tuoi'],$row_select['sdt'],$row_select['email'],$row_select['diachi'],$row_select['matkhau']);
        array_push($array_sdt,$get_sdt);
        echo json_encode($array_sdt,JSON_UNESCAPED_UNICODE);
    }else{
        echo "F";
    }
?>