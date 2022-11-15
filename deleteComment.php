<?php
    include_once './connect.php';
    $id = $_POST['id'];
    $blog_id = $_POST['blog_id'];
    $query = "DELETE FROM comment_fb WHERE id = $id";
    $result = $conn->query($query);
    if($result){
        $query_select = "SELECT * FROM feedback WHERE id_fb = $blog_id";
        $result_select = $conn -> query($query_select);
        if($result_select -> num_rows > 0){
            $row = $result_select->fetch_assoc();
            $number_comment = $row['so_luot_binh_luan'] - 1;
            if($number_comment >= 0){
                $query_update = "UPDATE feedback SET so_luot_binh_luan = $number_comment WHERE id_fb = $blog_id";
                $result_update = $conn->query($query_update);
                if($result_update){
                    echo "1";
                }else{
                    echo "2";
                }
            }
            
        }
    }else{
        echo "2";
    }
?>