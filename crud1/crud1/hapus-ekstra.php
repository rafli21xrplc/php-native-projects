<?php

include("config.php");

session_start();
if (!isset($_SESSION['username'])){
    header('Location: index.php');
}

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];
    $where = "SELECT nameImage FROM ekstra where id='$id'";
    $foto = mysqli_fetch_assoc(mysqli_query($db, $where))['nameImage'];

        if (unlink("imagesekstra/$foto")) {
    $sql = "DELETE FROM ekstra WHERE id='$id'";
    $query = mysqli_query($db, $sql);
        }

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list-ekstra.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>