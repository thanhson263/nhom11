<?php
    include("./connect.php");
    include("./model/category.php");

    $sql_select_category = "SELECT * FROM category";
    $result_select_category = $conn->query($sql_select_category);
    if($result_select_category->num_rows > 0){
        $array = [];
        while($row_select_category = $result_select_category->fetch_array()){
            $category = new Category($row_select_category['cate_id'],$row_select_category['name'],$row_select_category['image']);
            array_push($array,$category);
        }
        echo json_encode($array,JSON_UNESCAPED_UNICODE);
    }
?>