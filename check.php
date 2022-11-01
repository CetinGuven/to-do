


<?php

include "db.php";
include "response.php";
session_start();
$json = file_get_contents("php://input");
$data = json_decode($json);

//$yapıldı=$data->yapıldı;
$kisi = $_SESSION["Id"];


$query=$db->query("UPDATE gorev_ayrıntı SET status='1'  WHERE  id='$kisi'");
if($query==true)
{
        response(true,true,true);
}

// try { 
//     $query=$db->query("UPDATE gorev_ayrıntı SET status='1'");
//         if($query=true) {
//             response(true,"Yapıldı",true);
//         }else{
    
//         response(false,"Yapılacak",false);
//         }
    
//     } catch (PDOException $e) {
//             response(false,"Hata Oluştu",false);
    
//     }








?>