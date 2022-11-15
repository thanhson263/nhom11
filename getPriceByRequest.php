<?php
    include_once "./connect.php";
    include_once "./model/product.php";
    $min = $_POST['min'];
    $max = $_POST['max'];
    $request = $_POST['request'];
    if($request == "ASC"){
        if($min == 0 && $max == 0){
            $query = "SELECT * FROM product ORDER BY price ASC";
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
            $query = "SELECT * FROM product WHERE price BETWEEN $min AND $max ORDER BY price ASC";
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
    }else if($request == "DESC"){
        if($min == 0 && $max == 0){
            $query = "SELECT * FROM product ORDER BY price DESC";
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
            $query = "SELECT * FROM product WHERE price BETWEEN $min AND $max ORDER BY price DESC";
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
    }else if($request == "kytu"){
        if($min == 0 && $max == 0){
            $query = "SELECT * FROM product ORDER BY name_pr ASC";
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
            $query = "SELECT * FROM product WHERE price BETWEEN $min AND $max ORDER BY name_pr ASC";
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
    }else if($request == "chon"){
        $query = "SELECT * FROM product WHERE price BETWEEN $min AND $max";
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