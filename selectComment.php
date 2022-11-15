<?php
    include("./connect.php");
    include("./model/comment.php");
    $blog_id = $_POST['id'];
    $sql_select_comment = "SELECT * FROM comment_fb WHERE blog_id = $blog_id";
    // echo $sql_select_comment;
    $result_select_comment = $conn->query($sql_select_comment);
    $array_fb = [];
    while($row_select_comment = $result_select_comment -> fetch_array()){
        $comment = new Comment($row_select_comment['id'],$row_select_comment['blog_id'],$row_select_comment['img_blog'],$row_select_comment['name_blog'],$row_select_comment['detail_blog'],$row_select_comment['date_blog']);
        array_push($array_fb,$comment);
    }
    echo json_encode($array_fb,JSON_UNESCAPED_UNICODE);
?>