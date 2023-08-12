<?php
if (isset($_GET['id'])) {
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

    $id = $_GET['id'];
    $sql = "DELETE FROM kelas WHERE id = '$id'";
    if ($connection->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}
?>
