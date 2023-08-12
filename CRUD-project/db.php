<?php

$host = "localhost";
$port = 3306;
$user = "root";
$pass = "";
$database = "universitas";

try {
    $conn = new PDO("mysql:host=$host:$port;dbname=$database", $user, $pass);
    // $conn = null;
} catch (PDOException $pdo) {
    echo "error connect database\n";
    echo $pdo->getMessage();
}
