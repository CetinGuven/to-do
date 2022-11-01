

<?php

include "db.php";
include "response.php";

session_start();

$json = file_get_contents("php://input");
$data = json_decode($json);

$title=$data->title;
$kisi = $_SESSION['Id'];

if(($title== "")) {
    response(false, "Lütfen boş bırakmayınız", false);
}

$query = $db->prepare("INSERT INTO gorev_ayrıntı(title,users_id) VALUES (?,?)");
$insert = $query->execute([$title,$kisi]);
if ($query) {
   
    response(true, "$title,$kisi ", true);
}
session_destroy();


















?>