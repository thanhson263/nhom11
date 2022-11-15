<?php
    include("./connect.php");
    include("./model/slider.php");

    $sql_select_category = "SELECT * FROM slider";
    $result_select_category = $conn->query($sql_select_category);
    if($result_select_category->num_rows > 0){
        $array = [];
        while($row_select_category = $result_select_category->fetch_array()){
            $category = new Category($row_select_category['id_slider'],$row_select_category['image_slider'],$row_select_category['name_slider']);
            array_push($array,$category);
        }
        echo json_encode($array,JSON_UNESCAPED_UNICODE);
    }
?>