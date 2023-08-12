<?php

include("config.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];
    $where = "SELECT nameImage FROM perpus where id='$id'";
    $foto = mysqli_fetch_assoc(mysqli_query($db, $where))['nameImage'];

        if (unlink("imagesperpus/$foto")) {
    $sql = "DELETE FROM perpus WHERE id='$id'";
    $query = mysqli_query($db, $sql);
        }

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list-perpus.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>