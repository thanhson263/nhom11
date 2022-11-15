<?php
    include("./connect.php");
    include("./model/user.php");
    $sql_select = "SELECT * FROM customer";
    $result_select = $conn->query($sql_select);
    if($result_select->num_rows > 0){
        $array = [];
        while($row_select = $result_select->fetch_array()){
            $user = new User($row_select['id'],$row_select['hinh_anh'],$row_select['ten_khach_hang'],$row_select['tuoi'],$row_select['sdt'],$row_select['email'],$row_select['diachi'],$row_select['matkhau']);
            array_push($array,$user);
            // print_r($user);
        }
        echo json_encode($array,JSON_UNESCAPED_UNICODE); 
    }
?>