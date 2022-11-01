
<?php
include "db.php";
include "response.php";

$json = file_get_contents("php://input");
$data = json_decode($json);

$name = $data->name;
$email = $data->email;
$password = $data->password;

if (!isset($name) || !isset($email) || !isset($password)) {
    response(false, "Lütfen eksik yerleri doldurun", false);
}

if(($name=="") || ($email=="") || ($password==""))  {
    response(false, "Lütfen boş bırakmayınız", false);
}

$emailCheckQuery = $db->query("SELECT * FROM users WHERE  email='$email'");
$emailCheckQuery->execute();

if ($emailCheckQuery->rowCount() > 0) {
    response(false, "Bu Email üzerine Hesap Bulunmaktadır", false);
}

if(!preg_match("@[0-9]+@", $password)||!preg_match("@[A-Z]+@", $password) ||!preg_match("@[a-z]+@", $password) )
{
    response(false, "Lütfen en az bir tane küçük/büyük harf ve rakam giriniz", false);
}

$query = $db->prepare(
    "INSERT INTO `users`( `name`, `email`, `password` ) VALUES (?,?,?)"
);
$insert = $query->execute([$name, $email, $password]);

if ($query) {
    $last_id = $db->lastInsertId();
    response($last_id, "Kayıt işleminiz yapıldı.", true);
}


?>
