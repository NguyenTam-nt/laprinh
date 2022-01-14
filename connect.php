<?php 
    include("config.php");

    function execute($sql){
        $connect = mysqli_connect(server, user, password, database);
       mysqli_set_charset($connect, "utf8");
       $run = mysqli_query($connect,$sql);
        mysqli_close($connect);
        return $run;
    }

    function LoadData($sql, $isArray= true) {
            $connect = mysqli_connect(server, user, password, database);
            $result = mysqli_query($connect,$sql);
            $data = array();
            if($isArray) {
                while($row = mysqli_fetch_array($result, 1)) {
                    $data[] = $row;
                }
            }else {
                $data = mysqli_fetch_array($result, 1);
            }

            return $data;
    }



 ?>