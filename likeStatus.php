<?php
    include './connect.php';
    $title_post = $_POST['title'];
    $count = $_POST['countLike'];
    $sql_update_count_like = "UPDATE feedback SET so_luot_thich = $count WHERE bai_viet = '$title_post'";
    $result_update_count_like = $conn -> query($sql_update_count_like);
    // if($result_update_count_like){

    // }
?>