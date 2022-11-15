<?php
    include_once "./connect.php";
    include_once "./model/product.php";
    $min = $_POST['min'];
    $max = $_POST['max'];
    $sl_min = $_POST['sl_min'];
    $sl_max = $_POST['sl_max'];
    if($min == 0 && $max == 0){
        $query = "SELECT * FROM product WHERE quantity BETWEEN $sl_min AND $sl_max";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            $array = [];
            while($row_select_pr = $result->fetch_array()){
                $product = new Product($row_select_pr['product_id'],$row_select_pr['cate_id'],$row_select_pr['name_pr'],$row_select_pr['quantity'],$row_select_pr['price'],$row_select_pr['image_pr'],$row_select_pr['link_ytb'],$row_select_pr['description']);
                array_push($array,$product);
            }
            echo json_encode($array,JSON_UNESCAPED_UNICODE);
        }else{
            echo "Lỗi";
        }
    }else{
        $query = "SELECT * FROM product WHERE quantity BETWEEN $sl_min AND $sl_max AND price BETWEEN $min AND $max";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            $array = [];
            while($row_select_pr = $result->fetch_array()){
                $product = new Product($row_select_pr['product_id'],$row_select_pr['cate_id'],$row_select_pr['name_pr'],$row_select_pr['quantity'],$row_select_pr['price'],$row_select_pr['image_pr'],$row_select_pr['link_ytb'],$row_select_pr['description']);
                array_push($array,$product);
            }
            echo json_encode($array,JSON_UNESCAPED_UNICODE);
        }else{
            echo "Lỗi";
        }
    }
?>