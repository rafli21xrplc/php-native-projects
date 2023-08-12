<?php
session_start();

// Lakukan koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "mycrud";

$connection = new mysqli($servername, $username, $password, $database);

// Cek apakah koneksi berhasil
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Ambil email dari sesi saat logout
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Hapus data email dari database
    $sql = "DELETE FROM users WHERE email = '$email'";
    $result = $connection->query($sql);
}

// Destroy sesi
session_destroy();

// Arahkan kembali ke halaman login atau halaman lain yang sesuai
header("Location: index.php");
exit(); // Hentikan eksekusi skrip selanjutnya
?>
