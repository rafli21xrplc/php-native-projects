<?php

include("config.php");

session_start();
if (!isset($_SESSION['username'])){
    header('Location: index.php');
}

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];
    $where = "SELECT nameImage FROM pkl where id='$id'";
    $foto = mysqli_fetch_assoc(mysqli_query($db, $where))['nameImage'];

        if (unlink("images/$foto")) {
    $sql = "DELETE FROM pkl WHERE id='$id'";
    $query = mysqli_query($db, $sql);
        }

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list-siswa.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>