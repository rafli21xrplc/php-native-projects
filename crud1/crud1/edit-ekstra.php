<?php

include("config.php");


// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-ekstra.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM ekstra WHERE id='$id'";
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

    <title>Formulir Edit Ekstra</title>
</head>

<body>
    <header>
         <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                  <a class="navbar-brand text-uppercase fw-bold" href="#page-top">Edit Ekstrakulikuler</a>
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

    <form action="progres-ekstra.php" method="POST" enctype="multipart/form-data">

        <fieldset>

            <div class="card">
                <div class="card-header bg-secondary fst-italic text-white">Edit Ekstrakulikuler</div>

            <div class="card-body">
               <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

                    <div class="form-group">
                        <label for="pembimbing">Pembimbing</label>
                        <input type="text" name="pembimbing" required="" class="form-control" value="<?php echo $siswa['pembimbing'] ?>"/>
                    </div>

                    <div class="col-md-12">
                        <label for="nama_ekstra" class="form-label">Ekstrakulikuler</label>
                        <?php $ne = $siswa['nama_ekstra']; ?>                       
                            <select name="nama_ekstra"  id="" class="form-select">
                                <option <?php echo ($ne == 'Pramuka') ? "selected": "" ?>>Pramuka</option>
                                <option <?php echo ($ne == 'Basket') ? "selected": "" ?>>Basket</option>
                                <option <?php echo ($ne == 'Volly') ? "selected": "" ?>>Volly</option>
                                <option <?php echo ($ne == 'Fotografi') ? "selected": "" ?>>Fotografi</option>
                                <option <?php echo ($ne == 'Web Desain') ? "selected": "" ?>>Web Desain</option>
                            </select>
                    </div>

                    <div class="col-md-12">
                        <label for="tempat" class="form-label">Tempat Ekstra</label>
                        <?php $tempat = $siswa['tempat']; ?>                       
                            <select name="tempat"  id="" class="form-select">
                                <option <?php echo ($tempat == 'Halaman Sekolah') ? "selected": "" ?>>Halaman Sekolah</option>
                                <option <?php echo ($tempat == 'Lapangan') ? "selected": "" ?>>Lapangan</option>
                                <option <?php echo ($tempat == 'Lap Volly') ? "selected": "" ?>>Lap Volly</option>
                                <option <?php echo ($tempat == 'R. Jurnalis') ? "selected": "" ?>>R. Jurnalis</option>
                                <option <?php echo ($tempat == 'Lab. RPL') ? "selected": "" ?>>Lab. RPL</option>
                            </select>
                    </div>


                    <div class="mb-3">
                        <label>Foto</label>
                            <input class="form-control" type="file" name="file" id="formFile">
                            <input type="hidden" name="nameImage" value="<?= $siswa['nameImage'] ?>">
                    </div>

                <input type="submit" value="Simpan" name="simpan" class="btn btn-primary mb-2" />
                <input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-primary mb-2" />

            </div>

        </fieldset>

    </form>

    </body>
</html>