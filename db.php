<?php

$host = "localhost";
$dbname = "todolist";
$db_username = "root";
$db_password = "A12345678";

try {
    $db = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $db_username,
        $db_password
    );
   
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
