<?php
if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mycrud";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $id = $_POST["id"];
    $nama_kelas = $_POST["nama_kelas"];
    $wali_kelas = $_POST["wali_kelas"];

    $sql = "UPDATE kelas SET nama_kelas = '$nama_kelas', wali_kelas = '$wali_kelas' WHERE id = '$id'";
    if ($connection->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating record: " . $connection->error;
    }

    $connection->close();
}
?>
