<?php
    include("./connect.php");
    $email = $_POST['email'];
    $id = $_POST['id'];
    $sql_change_email = "UPDATE customer SET email = '$email' WHERE id = $id";
    // echo $sql_change_email;
    $result_change_email = $conn->query($sql_change_email);
    if($result_change_email){
        echo "1";
    }else{
        echo "2";
    }
?>