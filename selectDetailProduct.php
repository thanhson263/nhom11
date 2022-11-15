<?php
    include("./connect.php");
    include("./model/product.php");
    $id = $_POST['id'];
    $sql_select_detail_product = "SELECT * FROM `product` WHERE product_id = $id";
    // echo $sql_select_detail_product;
    $result_select_detail_product = $conn -> query($sql_select_detail_product);
    $array = [];
    while($row_select_detail_product = $result_select_detail_product -> fetch_array()){
    $detail_product = new Product($row_select_detail_product['product_id'],$row_select_detail_product['cate_id'],$row_select_detail_product['name_pr'],$row_select_detail_product['quantity'],$row_select_detail_product['price'],$row_select_detail_product['image_pr'],$row_select_detail_product['link_ytb'],$row_select_detail_product['description']);
        array_push($array,$detail_product);
    }
    echo json_encode($array,JSON_UNESCAPED_UNICODE);
?>