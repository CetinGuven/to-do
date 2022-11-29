<?php
include "db.php"; //Connect to database
include "response.php";

$json = file_get_contents("php://input");
$data = json_decode($json);

$email = $data->email;
$password = $data->password;

if (!isset($email) || (!isset($password) && $email == "") || $password == "") {
    response(false, "Lütfen boş bırakmayınız", false);
}

$query = $db->query(
    "SELECT * FROM users WHERE  email='$email' AND password='$password'"
);
$query->execute();

if ($query->rowCount() < 1) {
    response(false, "Email veya şifre yanlış", false);


} else {
    session_start();
    $user = $query->fetch(PDO::FETCH_OBJ);
    $_SESSION["Id"] = $user->id;
    $_SESSION["Email"] = $user->email;
    response($_SESSION["Id"], "hoşgeldin tatlım", true);
}
?>
 
