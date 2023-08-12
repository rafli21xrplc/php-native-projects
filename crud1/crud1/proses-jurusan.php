<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $jurusan = $_POST['jurusan'];
    $pemegang = $_POST['pemegang'];
    $foto = $_FILES['file']['name'];
    $poto = $_FILES['file']['tmp_name'];
    $ukuranFile = $_FILES['file']['size'];
    $random = bin2hex(random_bytes(mt_rand(1, 20)));
    $uniqeNameImage = bin2hex(random_bytes(mt_rand(1, 20))) . "." . explode("/", $_FILES['file']['type'])[1];
    $targetFile = 'imagesjurusan/' . basename($uniqeNameImage);

    // var_dump($targetFile);die;

        //cek upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $foto);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('yang anda masukkan bukan gambar.');
        </script>";
        return false;
    }

    //cek ukuran
    if ($ukuranFile > 2073600) {
        echo "<script>
            alert('ukuran gambar terlalu besar.');
        </script>";
        return false;
    }


    move_uploaded_file($poto, $targetFile);


    // buat query
    $sql = "INSERT INTO jurusan (id, jurusan, pemegang, nameImage, dirImage) VALUES ('$random', '$jurusan', '$pemegang', '$uniqeNameImage', '$poto')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: list-jurusan.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: list-jurusan.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>