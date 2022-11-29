
<?php
include "db.php";
include "response.php";

$json = file_get_contents("php://input");
$data = json_decode($json);

$name = $data->name;
$email = $data->email;
$password = $data->password;

if (!isset($name) || !isset($email) || !isset($password)) {
    response(false, "Please fill in the missing fields", false);
}

if(($name=="") || ($email=="") || ($password==""))  {
    response(false, "Please fill in the missing fields", false);
}

$emailCheckQuery = $db->query("SELECT * FROM users WHERE  email='$email'");
$emailCheckQuery->execute();

if ($emailCheckQuery->rowCount() > 0) {
    response(false, "There is an Account on This Email", false);
}

if(!preg_match("@[0-9]+@", $password)||!preg_match("@[A-Z]+@", $password) ||!preg_match("@[a-z]+@", $password) )
{
    response(false, "Please enter at least one lower/uppercase letter and number", false);
}

$query = $db->prepare(
    "INSERT INTO `users`( `name`, `email`, `password` ) VALUES (?,?,?)"
);
$insert = $query->execute([$name, $email, $password]);

if ($query) {
    $last_id = $db->lastInsertId();
    response($last_id, "Your registration has been done.", true);
}


?>
