

<?php

include ("db.php");
include ("response.php");
    session_start();
    $id = $_SESSION["Id"];
    try {
        if(!isset($id)){
            response(false,"You Must Login First",false);
        }
        $infoQuery=$db->query("SELECT * FROM users WHERE  id='$id'");
        $infoQuery->execute();
        $datas = $infoQuery->fetchAll();
        if(count($datas) == 0){
            response(false,"Invalid Session",false);
        }else{
            response($datas[0],"",true);
        }
    } catch (\Throwable $th) {
        response(false,"An error occurred",false);
    }
?>
