<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mycrud";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);
$gambar = "";
$nama = "";
$jurusan = "";
$alamat = "";
$gender = "";

$errorMessage = "";
$successMessage = "";

if (isset($_POST['submit'])) {
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];
    $alamat = $_POST["alamat"];
    $gender = $_POST["gender"];

    // Validasi gambar yang diunggah
    if (!empty($_FILES['gambar']['tmp_name'])) {
        
        $gambar = bin2hex(random_bytes(mt_rand(1, 20))) . "." . explode("/", $_FILES['gambar']['type'])[1];
        $tmpFile = $_FILES['gambar']["tmp_name"];

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $gambar);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $errorMessage = "File yang Anda unggah bukan gambar.";
        } else {
            // Simpan gambar ke folder uploads
            if (move_uploaded_file($tmpFile, "images/" . basename($gambar))) {
                //var_dump(move_uploaded_file($tmpFile, "images/" . basename($gambar)));die;
                // Lanjutkan dengan penyimpanan data ke database
                $sql = "INSERT INTO pkl (nama, jurusan, alamat, gender, gambar) " .
                    "VALUES ('$nama','$jurusan','$alamat','$gender', '$gambar')";
                $result = $connection->query($sql);

                if (!$result) {
                    $errorMessage = "Invalid query: " . $connection->error;
                } else {
                    $successMessage = "Data telah ditambahkan";
                    // Redirect ke halaman list_siswa.php jika berhasil
                    header("location: list_siswa.php");
                    exit(); // Hentikan eksekusi skrip selanjutnya
                }
            } else {
                $errorMessage = "Gagal mengunggah gambar.";
            }
        }
    } else {
        $errorMessage = "Gambar harus diunggah.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mycrud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark p-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><h1>ASIKKK</h1></a>
        <ul class="nav nav-pills nav-fill navbar-nav ms-auto mb-2 mb-lg-0">
            <!-- ... -->
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-2">
<div class="container-fluid">
<ul class="nav nav-pills nav-fill navbar-nav ms-auto mb-2 mb-lg-0">
<li class="nav-item">
    <a class="nav-link " aria-current="page" href="http://localhost/mycrud/dashboard.php"><h2>home</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="http://localhost/mycrud/kelas/index.php"><h2>Kelas</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link a" aria-current="page" href="http://localhost/mycrud/list_siswa.php"><h2>siswa</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/mycrud/list_guru.php"><h2>guru</h2></a>
  </li>
  <li class="nav-item ">
    <a class="nav-link " href="http://localhost/mycrud/absen/index.php"><h2>absensi</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="http://localhost/mycrud/index.php"><h2>logout</h2></a>
  </li>
</ul>
</nav>
        </ul>
    </div>
</nav>
<body>
    <style>
        body{
            background-color : lightgreen;
        }
    </style>
    <div class="container my-5">
        <form method="POST" action="" enctype="multipart/form-data">
            <!-- Tempatkan pesan error di bawah form -->
            <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Error:</strong> $errorMessage
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>

            <table class="table-warning">
                <center><h2>CREATE</h2></center>

                <body>
                    <div class="container col-md-6 mt-4">

                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <center><h5>Tambah Data Siswa</h5></center>
                            </div>
                            <div class="form-group">
                                <label><h4>Foto</h4></label>
                                <input class="form-control" type="file" name="gambar" />
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><h4>Nama</h4></label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan nama..." value="<?php echo $nama; ?>">
                                </div>

                                <div class="form-group">
                                    <label><h4>Alamat</h4></label>
                                    <textarea class="form-control" name="alamat"placeholder="Masukan Alamat..."><?php echo $alamat; ?></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label  class="form-label"> <h4>Jurusan</h4></label>
                                    <select name="jurusan"  id="" class="form-select">
                                        <option selected>Choose...</option>
                                        <option value="RPL">RPL</option>
                                        <option value="TKJ">TKJ</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="IT">IT</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><h4>Jenis Kelamin</h4></label><br>
                                    <input type="radio" class="from-control" name="gender" value="L" <?php if($gender == "L") echo "checked"; ?>><h5>Laki-laki</h5>
                                    <input type="radio" class="from-control" name="gender" value="P" <?php if($gender == "P") echo "checked"; ?>><h5>Perempuan</h5>
                                    </br>
                                </div>
                                <?php
                                if (!empty($successMessage)) {
                                    echo "
                                        <div class ='row mb-3'>
                                        <div class ='offset-sm-3 col-sm-6'>
                                        <div class ='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>$successMessage</strong>
                                         <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        </div>
                                        </div>
                                        ";
                                }
                                ?>
                                <div class="row mb-3">
                                    <div class="offset-sm-3 col-sm-3 d-grid">
                                        <input name="submit" type="submit" class="btn btn-primary" href="/mycrud/index.php"></input>
                                    </div>
                                    <div class="col-sm-3 d-grid">
                                        <input type="submit" name="
