<?php
    include_once "./connect.php";
    $id = $_POST['id'];
    $image_blog = $_POST['image_blog'];
    $name_blog = $_POST['name_blog'];
    $desc_blog = $_POST['desc_blog'];
    $date_blog = $_POST['date_blog'];
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date_blog = date("Y-m-d H:i:s");
    $query = "INSERT INTO comment_fb VALUES (null,$id,'$image_blog','$name_blog','$desc_blog','$date_blog')";
    // echo $query;
    $result = $conn->query($query);
    if($result){
        $query_select = "SELECT * FROM feedback WHERE id_fb = $id";
        $result_select = $conn -> query($query_select);
        if($result_select -> num_rows > 0){
            $row = $result_select->fetch_assoc();
            $number_comment = $row['so_luot_binh_luan'] + 1;
            $query_update = "UPDATE feedback SET so_luot_binh_luan = $number_comment WHERE id_fb = $id";
            $result_update = $conn->query($query_update);
            if($result_update){
                echo "1";
            }else{
                echo "2";
            }
        }
    }else{
        echo "2";
    }
?>