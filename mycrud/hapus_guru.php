<?php
if (isset($_GET["id"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mycrud";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $id = $_GET["id"];
    $where = "SELECT foto FROM guru where id_guru='$id'";
    $gambar = mysqli_fetch_assoc(mysqli_query($connection, $where))['foto'];

        if (unlink("images/$gambar")) {
    $sql = "DELETE FROM guru WHERE id_guru='$id'";
    $query = mysqli_query($db, $sql);
        }

    $sql = "DELETE FROM guru WHERE id_guru = " . $id;
    $delete = $connection->query($sql);


    if ($connection)
    {
       
        header("location: list_guru.php");
    }
}
?>
