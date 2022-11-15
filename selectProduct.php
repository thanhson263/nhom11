<?php
    include("./connect.php");
    include("./model/product.php");

    $sql_select_pr = "SELECT * FROM product";
    $result_select_pr = $conn->query($sql_select_pr);
    if($result_select_pr->num_rows > 0){
        $array = [];
        while($row_select_pr = $result_select_pr->fetch_array()){
            $product = new Product($row_select_pr['product_id'],$row_select_pr['cate_id'],$row_select_pr['name_pr'],$row_select_pr['quantity'],$row_select_pr['price'],$row_select_pr['image_pr'],$row_select_pr['link_ytb'],$row_select_pr['description']);
            array_push($array,$product);
        }
        echo json_encode($array,JSON_UNESCAPED_UNICODE);
    }
?>