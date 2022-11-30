
<?php

include ("db.php");
include "response.php";

session_start();
$json = file_get_contents("php://input");
$data = json_decode($json);

$listeleme=$data->listeleme;
$kisi = $_SESSION["Id"];

$query=$db->prepare("SELECT * FROM gorev_ayrıntı WHERE users_id='$kisi'");
$query->execute();

    while($row=$query->fetch(PDO::FETCH_ASSOC) ){
       
        response( $row["title"]." ".$row["date_time"]." ".$row["status"],true,true);
    }
  
?>

