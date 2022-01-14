<?php
    include("connect.php");
    if(isset($_GET['email'])) {
        $email = $_GET['email'];
        $sql = "SELECT * FROM users WHERE email = '$email'";
            $data = LoadData($sql, false);
            if(empty($data)) {
                echo json_encode([
                    "status"=>false,
                ]);
            }else {
                echo json_encode([
                    "status"=> true,
                ]);
            }
     }