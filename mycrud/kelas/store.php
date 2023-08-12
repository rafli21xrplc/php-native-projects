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

    $nama_kelas = $_POST["nama_kelas"];
    $wali_kelas = $_POST["wali_kelas"];

    $sql = "INSERT INTO kelas (nama_kelas, wali_kelas) VALUES ('$nama_kelas', '$wali_kelas')";
    if ($connection->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>
