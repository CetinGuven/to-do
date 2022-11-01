
<?php

include "db.php";
include "response.php";

session_start();
$json = file_get_contents("php://input");
$data = json_decode($json);

$yapıldı=$data->yapıldı;
$kisi = $_SESSION["Id"];

try { 
         $query=$db->query("UPDATE gorev_ayrıntı SET status='$yapıldı' WHERE users_id='$kisi'");
            if($query>0) {
                response(true,true,true);
            }
        
        } catch (PDOException $e) {
                response(false,"Hata Oluştu",false);
        
        }


?>