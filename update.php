

<?php

include "db.php";
include "response.php";
session_start();
$json = file_get_contents("php://input");
$data = json_decode($json);

$kisi = $_SESSION["Id"];


try { 
   
$query=$db->query("UPDATE gorev_ayrıntı SET title='$güncelle' WHERE users_id='$kisi'");
    if($query>0) {
        response(true,"Update Successful",true);
    }else{

    response(false,"Update Failed",false);
    }

} catch (PDOException $e) {
        response(false,"error",false);

}
 



?>
