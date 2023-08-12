<?php
if (isset($_GET["id"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mycrud";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $id = $_GET["id"];
    $where = "SELECT gambar FROM pkl where id='$id'";
    $gambar = mysqli_fetch_assoc(mysqli_query($connection, $where))['gambar'];

        if (unlink("images/$gambar")) {
    $sql = "DELETE FROM pkl WHERE id='$id'";
    $query = mysqli_query($db, $sql);
        }

    $sql = "DELETE FROM pkl WHERE id = " . $id;
    $delete = $connection->query($sql);


    if ($connection)
    {
       
        header("location: list_siswa.php");
    }
}
?>
