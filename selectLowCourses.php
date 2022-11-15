<?php
    include("./connect.php");
    include("./model/product.php");
    // $id_cate = $_POST['id'];
    $sql_select_product_by_id = "SELECT * FROM product WHERE price < 5000000";
    $result_select_product_by_id = $conn->query($sql_select_product_by_id);
    if($result_select_product_by_id -> num_rows > 0){
        $array = [];
        while($row_select_product_by_id = $result_select_product_by_id -> fetch_array()){
            $product_by_id = new Product($row_select_product_by_id['product_id'],$row_select_product_by_id['cate_id'],$row_select_product_by_id['name_pr'],$row_select_product_by_id['quantity'],$row_select_product_by_id['price'],$row_select_product_by_id['image_pr'],$row_select_product_by_id['link_ytb'],$row_select_product_by_id['description']);
            array_push($array,$product_by_id);
        }
        echo json_encode($array,JSON_UNESCAPED_UNICODE);
    }
?>