<?php

include("config.php");

session_start();
if (!isset($_SESSION['username'])){
    header('Location: index.php');
}

if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $ne = $_POST['nama_ekstra'];
    $pembimbing = $_POST['pembimbing'];
    $tempat = $_POST['tempat'];
    $foto = $_FILES['file']['name'];
    $namaGambarLama = $_POST['nameImage'];

    // var_dump($namaGambarLama);die;
    
    if ($_FILES['file']['error'] == 0){
        unlink("imagesekstra/$namaGambarLama");
        $foto = bin2hex(random_bytes(mt_rand(1, 20))).".".explode("/", $_FILES['file']['type'])[1];
    } else {
        $foto = $namaGambarLama;
    }
    
    $targetFile = 'imagesekstra/' . basename($foto);
    $poto = $_FILES['file']['tmp_name'];

    move_uploaded_file($poto, $targetFile);

    // buat query update
    $sql = "UPDATE ekstra SET nama_ekstra='$ne', pembimbing='$pembimbing', tempat='$tempat', nameImage='$foto', dirImage='$poto' WHERE id='$id'";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-ekstra.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}
