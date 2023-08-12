<?php
if (isset($_GET["id"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mycrud";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $id = $_GET["id"];
    $sql = "DELETE FROM perpus WHERE id = " . $id;
    $connection->query($sql);
    
    if ($connection)
        {
            header("location: index.php");
        }
}
?>
