<?php
    include("./connect.php");
    include("./model/status.php");
    $sql_select_feedback = "SELECT * FROM feedback,customer WHERE customer.id = feedback.id_kh";
    $result_select_feedback = $conn->query($sql_select_feedback);
    $array_fb = [];
    while($row_select_feedback = $result_select_feedback -> fetch_array()){
        $feedback = new Status($row_select_feedback['id_fb'],$row_select_feedback['id_kh'],$row_select_feedback['ten_khach_hang'],$row_select_feedback['hinh_anh'],$row_select_feedback['bai_viet'],$row_select_feedback['hinh_anh_bai_viet'],$row_select_feedback['so_luot_thich'],$row_select_feedback['so_luot_binh_luan']);
        array_push($array_fb,$feedback);
    }
    echo json_encode($array_fb,JSON_UNESCAPED_UNICODE);
?>