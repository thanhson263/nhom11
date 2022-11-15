<?php
    include_once "./connect.php";
    $id = $_POST['id'];
    $desc_comment = $_POST['desc_comment'];
    $query = "UPDATE comment_fb SET detail_blog = '$desc_comment' WHERE id = $id";
    // echo $query;
    $result = $conn->query($query);
    if($result){
        echo "1";
    }else{
        echo "2";
    }
?>