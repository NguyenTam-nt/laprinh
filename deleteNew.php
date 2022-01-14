<?php
include("connect.php");
 if(isset($_GET["_id"])) {
    $id = $_GET["_id"];
    $sql = "DELETE FROM news WHERE id_news = '$id'";
    $status = execute($sql);
    if($status) {
        
            echo json_encode(["status"=>"ok", "_id"=> $id]);
    }else {
        echo  json_encode(["status"=>"error"]);

    }
}

?> 
