<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-jurusan.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM jurusan WHERE id='$id'";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <title>Formulir Edit Jurusan</title>
</head>

<body>
    <header>
         <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                  <a class="navbar-brand text-uppercase fw-bold" href="#page-top">Edit Jurusan</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-siswa.php">Siswa</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-guru.php">Mapel Guru</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-jurusan.php">Jurusan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-ekstra.php">Ekstra</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-perpus.php">Perpus</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <form action="progres-jurusan.php" method="POST" enctype="multipart/form-data">

        <fieldset>

            <div class="card">
                <div class="card-header bg-secondary fst-italic text-white">Edit Jurusan</div>

            <div class="card-body">


            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

                <div class="col-md-12">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <?php $jurusan = $siswa['jurusan']; ?>                       
                        <select name="jurusan"  id="" class="form-select">
                            <option <?php echo ($jurusan == 'RPL') ? "selected": "" ?>>RPL</option>
                            <option <?php echo ($jurusan == 'TKJ') ? "selected": "" ?>>TKJ</option>
                            <option <?php echo ($jurusan == 'ELIN') ? "selected": "" ?>>ELIN</option>
                            <option <?php echo ($jurusan == 'METRO') ? "selected": "" ?>>METRO</option>
                        </select>
                </div>

                <div class="form-group">
                    <label for="pemegang">Nama Guru</label>
                        <input type="text" name="pemegang" required="" class="form-control" value="<?php echo $siswa['pemegang'] ?>"/>
                </div>

                    <div class="mb-3">
                        <label>Foto</label>
                            <input class="form-control" type="file" name="file" id="formFile">
                            <input type="hidden" name="nameImage" value="<?= $siswa['nameImage'] ?>">
                    </div>

                <input type="submit" value="Simpan" name="simpan" class="btn btn-primary mb-2" />
                <input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-primary mb-2" />

        </fieldset>


    </form>

    </body>
</html>