<?php
    include ("db.php");

    function response($data,$message,$success){
        header( 'Content-Type:application/json');
        echo json_encode(array(
            "success" => $success,
            "message" => $message,
            "data" => $data,
        ));
        die();
    }

    function checkSession($dbCheck = false){
        try {
        if(!isset($_SESSION["Id"])||!isset($_SESSION["Email"]) ){
                response(false,"Session Kaydı yok",false);
          }
            $SessionQuery=$db->query("SELECT * FROM users WHERE  id='$id' AND email='$email'");
            $SessionQuery->execute();
            $datas = $SessionQuery->fetchAll();
             if(count($datas) == 0){
                 response(false,"Geçersiz Session",false);
            } else{
                response($datas[0],"",true);
             }} catch (PDOException $e) {
                    response(false,"Hata Oluştu",false);

       }}
?>
