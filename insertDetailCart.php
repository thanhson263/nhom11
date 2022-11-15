<?php
    include("./connect.php");
    $json = $_POST['json'];
    $data_array = json_decode($json,true);
    print_r($data_array);
    // $id_cart = rand(0,99);
    foreach($data_array as $values){
        $id_cart = $values['id'];
        $image = $values['image'];
        $ten_san_pham = $values['ten_san_pham'];
        $giasp = $values['gia_san_pham'];
        $soluongsp = $values['so_luong'];
        $sql_insert_detail_cart = "INSERT INTO detail_cart VALUES(null,$id_cart,'$image','$ten_san_pham',$soluongsp,$giasp)";
        $result_insert_detail_cart = $conn -> query($sql_insert_detail_cart);
        if($result_insert_detail_cart){
            echo "1";
        }else{
            echo "0";
        }
    }

?>