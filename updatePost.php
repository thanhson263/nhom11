
<?php
include("./connect.php");
$link_anh = "http://192.168.43.42/FricaShop/webservice/images";
$dir = "./images";
// echo $dir;
$id_blog = $_POST['id_blog'];
$image_blog = $_POST['image_blog'];
$title_blog = $_POST["title_blog"];
if(!file_exists($dir)){
    mkdir($dir,0755,true);
}
$name = "/".rand()."_".time().".jpeg";
$dir = $dir.$name;
if(file_put_contents($dir,base64_decode($image_blog))){
    $file_anh = $link_anh.$name;
    $sql_update = "UPDATE feedback SET bai_viet = '$title_blog', hinh_anh_bai_viet = '$file_anh' WHERE id_fb = $id_blog";
    // echo $sql_update;
    $result = $conn ->query($sql_update);
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