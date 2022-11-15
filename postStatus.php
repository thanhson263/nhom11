<?php
include("./connect.php");
$link_anh = "http://192.168.43.42/FricaShop/webservice/images";
$dir = "./images";
// echo $dir;
$ten_nguoi_dang = $_POST['ten_nguoi_dang'];
$bai_viet = $_POST['bai_viet'];
$image = $_POST["image"];
if(!file_exists($dir)){
    mkdir($dir,0755,true);
}
$name = "/".rand()."_".time().".jpeg";
$dir = $dir.$name;
if(file_put_contents($dir,base64_decode($image))){
    $file_anh = $link_anh.$name;
    $sql_post = "INSERT INTO feedback VALUES (null,$ten_nguoi_dang,'$bai_viet','$file_anh',0,0)";
    // echo $sql_insert;
    $result = $conn ->query($sql_post);
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