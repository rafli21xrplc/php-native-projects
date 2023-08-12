<?php
if (isset($_GET["id"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mycrud";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $id = $_GET["id"];
    $where = "SELECT bukti FROM absen where id='$id'";
    $bukti = mysqli_fetch_assoc(mysqli_query($connection, $where))['bukti'];

        if (unlink("images/$bukti")) {
    $sql = "DELETE FROM absen WHERE id='$id'";
    $query = mysqli_query($db, $sql);
        }

    $sql = "DELETE FROM absen WHERE id = " . $id;
    $delete = $connection->query($sql);


    if ($connection)
    {
       
        header("location: index.php");
    }
}
?>
