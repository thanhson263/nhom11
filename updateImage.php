<?php
include("./connect.php");
$link_anh = "http://192.168.43.42/FricaShop/webservice/images";
$dir = "./images";
// echo $dir;
// $ten_nguoi_dang = $_POST['ten_nguoi_dang'];
// $bai_viet = $_POST['bai_viet'];
$id = $_POST['id'];
$image = $_POST["image"];
if(!file_exists($dir)){
    mkdir($dir,0755,true);
}
$name = "/".rand().".jpeg";
$dir = $dir.$name;
if(file_put_contents($dir,base64_decode($image))){
    $file_anh = $link_anh.$name;
    $sql_change_image = "UPDATE customer SET hinh_anh = '$file_anh' WHERE id = $id";
    echo $sql_insert;
    $result = $conn ->query($sql_change_image);
    echo json_encode([
        "message" => "The file OK",
        "status" => "OK"
    ]);
}else{
    echo json_encode([
        "message" => "The file not OK, check again",
        "status" => "Error"
    ]); 
}
?>