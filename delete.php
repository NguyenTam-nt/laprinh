<?php
include("connect.php");
 if(isset($_GET["_id"])) {
    $id = $_GET["_id"];
    $sql = "DELETE FROM contact WHERE id_contact = '$id'";
    $status = execute($sql);
    if($status) {
        
            echo json_encode(["status"=>"ok", "_id"=> $id]);
    }else {
        echo  json_encode(["status"=>"error"]);

    }
}

?> 
