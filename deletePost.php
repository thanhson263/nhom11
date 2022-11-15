<?php
    include_once "./connect.php";
    $id = $_POST['id'];
    $query = "DELETE FROM feedback WHERE id_fb = $id";
    // echo $query;
    $result = $conn->query($query);
    if($result){
        $query_delete_comment = "DELETE FROM comment_fb WHERE blog_id = $id";
        $result_delete_comment = $conn->query($query_delete_comment);
        if($result_delete_comment){
            echo "1";
        }
    }else{
        echo "2";
    }
?>