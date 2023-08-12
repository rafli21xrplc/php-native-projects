<?php
$id = $_GET["id"];

function hapus($id)
{
    $conn = mysqli_connect('localhost', 'root', '', 'db_web');
    mysqli_query($conn, "DELETE FROM wisata where id = '$id'");
    return mysqli_affected_rows($conn);
}

if (hapus($id) > 0) {
    header("location: admin.php");
}
