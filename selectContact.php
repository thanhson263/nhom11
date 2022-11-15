<?php
    include("./connect.php");
    include("./model/contact.php");
    $sql_select_contact = "SELECT * FROM contact";
    $result_select_contact = $conn -> query($sql_select_contact);
    $array_contact = [];
    while($row_select_contact = $result_select_contact -> fetch_array()){
        $contact = new Contact($row_select_contact['id_lh'],$row_select_contact['ten_lh'],$row_select_contact['email_lh'],$row_select_contact['sdt_lh']);
        array_push($array_contact,$contact);
    }
    echo json_encode($array_contact,JSON_UNESCAPED_UNICODE);
?>