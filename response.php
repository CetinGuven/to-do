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
            }}}

        // $_SESSION["Id"] = $user->id;
        // $_SESSION["Email"] = $user->email;
        // kullanıcı giriş yapıldı mı kontrol edilecek (Session var mı ve dolu mu ?)
        // $dbCheck eğer true ise id ve email database ile uyuşuyor mu kontrol edilecek
    // //     session_start();
    // // $id = $_SESSION["Id"];
    // // try {
    // //     if(!isset($id)){
    // //         response(false,"Önce Giriş Yapmalısınız",false);
    // //     }
    // //     $infoQuery=$db->query("SELECT * FROM users WHERE  id='$id'");
    // //     $infoQuery->execute();
    // //     $datas = $infoQuery->fetchAll();
    // //     if(count($datas) == 0){
    // //         response(false,"Geçersiz Session",false);
    // //     }else{
    // //         response($datas[0],"",true);
    // //     }
    // // } catch (\Throwable $th) {
    // //     response(false,"Hata Oluştu",false);
    // // }
?>
    