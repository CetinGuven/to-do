

<?php

include ("db.php");
include ("response.php");
    session_start();
    $id = $_SESSION["Id"];
    try {
        if(!isset($id)){
            response(false,"Önce Giriş Yapmalısınız",false);
        }
        $infoQuery=$db->query("SELECT * FROM users WHERE  id='$id'");
        $infoQuery->execute();
        $datas = $infoQuery->fetchAll();
        if(count($datas) == 0){
            response(false,"Geçersiz Session",false);
        }else{
            response($datas[0],"",true);
        }
    } catch (\Throwable $th) {
        response(false,"Hata Oluştu",false);
    }
?>
