

<?php

include "db.php";
include "response.php";
session_start();
$json = file_get_contents("php://input");
$data = json_decode($json);

$güncelle=$data->güncelle;
$kisi = $_SESSION["Id"];


try { 
   
$query=$db->query("UPDATE gorev_ayrıntı SET title='$güncelle' WHERE users_id='$kisi'");
    if($query>0) {
        response(true,"Güncelleme Başarılıdır",true);
    }else{

    response(false,"Güncelleme olmadı",false);
    }

} catch (PDOException $e) {
        response(false,"Hata Oluştu",false);

}
 



?>