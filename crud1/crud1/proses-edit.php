<?php

include("config.php");

session_start();
if (!isset($_SESSION['username'])){
    header('Location: index.php');
}

if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];
    $jk = $_POST['jenis_kelamin'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_FILES['file']['name'];
    $namaGambarLama = $_POST['nameImage'];

    // var_dump($namaGambarLama);die;
    
    if ($_FILES['file']['error'] == 0){
        unlink("images/$namaGambarLama");
        $foto = bin2hex(random_bytes(mt_rand(1, 20))).".".explode("/", $_FILES['file']['type'])[1];
    } else {
        $foto = $namaGambarLama;
    }
    
    $targetFile = 'images/' . basename($foto);
    $poto = $_FILES['file']['tmp_name'];
    

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

    // buat query update
    $sql = "UPDATE pkl SET nama='$nama', alamat='$alamat', jurusan='$jurusan', jenis_kelamin='$jk', sekolah_asal='$sekolah', nameImage='$foto', dirImage='$poto' WHERE id='$id'";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}
